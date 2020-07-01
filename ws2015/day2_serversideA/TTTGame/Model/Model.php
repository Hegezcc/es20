<?php

namespace TTTGame\Model;

use TTTGame\Config;

abstract class Model {
    private $_data;
    private $_updated;

    protected $table;

    protected static $table_name;
    protected static $fields;
    protected static $computed;

    public function construct()
    {
        $this->_data = [];
        $this->_updated = [];

        $this->table = Config::$db['prefix'];
        if (static::$table_name) {
            $this->table .= static::$table_name;
        } else {
            preg_match('#([a-zA-Z0-9]+)$#', get_called_class(), $class);
            $this->table .= strtolower($class[1]) . 's';
        }
    }

    public function __destruct()
    {
        $this->save();
    }

    public function create()
    {
        global $conn;

        $q = $conn->prepare(static::_createQuery('insert', $this->_updated, null));

        foreach ($this->_updated as $key => $value) {
            $q->bindValue(":$key", $value);
        }

        $q->execute();

        $this->id = $conn->lastInsertId();
        $this->_data = $this->_updated;
        $this->_updated = [];
    }

    public function save()
    {
        global $conn, $debugmsg;

        if (Config::$debug) {
            $debugmsg[] = $this->_data;
        }

        if (!empty($this->_updated) && array_key_exists('id', $this->_data)) {
            $q = $conn->prepare(static::_createQuery('update', $this->_updated, ['id' => $this->id]));

            foreach ($this->_updated as $key => $value) {
                $q->bindValue(":$key", $value);
            }
            $q->bindParam(':id', $this->_data['id']);
            $q->execute();


        }
    }

    public function serialize()
    {
        return array_merge($this->_data, $this->_updated);
    }

    public static function getWhere($where)
    {
        global $conn;

        $queryText = static::_createQuery('select', static::$fields, $where);

        $q = $conn->prepare($queryText);
        foreach($where as $key => $value) {
            $q->bindValue(":$key", $value);
        }
        $q->execute();
        $data = $q->fetchAll();

        $classname = get_called_class();
        $models = [];

        foreach ($data as $item) {
            $obj = new $classname($conn);

            foreach ($item as $key => $value) {
                $obj->_set_data($key, $value);
            }

            $models[] = $obj;
        }

        return $models;
    }

    public function __get($name)
    {
        if (in_array($name, static::$fields) || array_key_exists($name, static::$computed)) {
            if (array_key_exists($name, $this->_updated)) {
                return $this->_updated[$name];
            } else if (array_key_exists($name, $this->_data)) {
                return $this->_data[$name];
            }

            return null;
        }

        throw new \Exception("Property $name not found in " . get_called_class() . '(getter)');
    }

    public function __set($name, $value)
    {
        if (in_array($name, static::$fields)) {
            $this->_updated[$name] = $value;
        } else {
            throw new \Exception("Property $name not found in " . get_called_class() . '(setter)');
        }
    }

    public function _set_data($name, $value)
    {
        if (in_array($name, static::$fields) || array_key_exists($name, static::$computed)) {
            $this->_data[$name] = $value;
        } else {
            throw new \Exception("Property $name not found in " . get_called_class() . '(private setter)');
        }
    }

    protected static function _createQuery($type, $data, $where, $limit = null, $orderby = null, $raw = null)
    {
        global $debugmsg;

        if (!empty($data)) {
            $keysImploded = implode(', ', array_keys($data));
            $keysBindImploded = ':' . implode(', :', array_keys($data));
            $dataPairs = implode(', ', array_map(function ($x) {return "$x = :$x";}, array_keys($data)));

            // Append to end of queries
            if (!empty($raw)) {
                $keysImploded .= ', ' . implode(', ', array_keys($raw));
                $keysBindImploded .= ', ' . implode(', ', array_values($raw));
                $dataPairs .= ', ' . implode(', ', array_map(function ($k, $v) {return "$k = $v";}, array_keys($raw), $raw));
            }
        }

        $query = '';

        $table = Config::$db['prefix'];
        if (static::$table_name) {
            $table .= static::$table_name;
        } else {
            preg_match('#([a-zA-Z0-9]+)$#', get_called_class(), $class);
            $table .= strtolower($class[1]) . 's';
        }

        switch ($type) {
            case 'insert':
                $query = "INSERT INTO $table ($keysImploded) VALUES ($keysBindImploded)";
                break;
            case 'update':
                $query = "UPDATE $table SET $dataPairs";
                break;
            case 'select':
                if (!empty(static::$computed)) {
                    foreach (static::$computed as $name => $expr) {
                        $data[] = "$expr AS $name";
                    }
                }

                $fields = implode(', ', $data);
                $query = "SELECT $fields FROM $table";
                break;
        }

        if (!empty($where)) {
            $wherePairs = implode(' AND ', array_map(function ($x) {return "$x = :$x";}, array_keys($where)));
            $query .= " WHERE $wherePairs";
        }

        if (!empty($orderby)) {
            $query .= " ORDER BY $orderby";
        }

        if (!empty($limit)) {
            $query .= " LIMIT $limit";
        }

        if (Config::$debug) {
            $debugmsg[] = $query;
        }

        return $query;
    }
}