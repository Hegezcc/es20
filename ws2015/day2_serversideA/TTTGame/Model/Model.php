<?php

namespace TTTGame\Model;

use TTTGame\Config;

abstract class Model implements ModelInterface {
    private $data = [];
    public $isDirty = false;

    protected function construct($id, $create)
    {
        global $conn;

        if (!empty($id)) {
            $this->getData($id);
        } else if ($create) {
            $this->create();
        }
    }

    public function __destruct()
    {
        if ($this->isDirty) {
            if (isset($this->data['id'])) {
                $this->save();
            } else {
                $this->create();
            }
        }
    }

    public function __get($key)
    {
        return $this->data[$key] ?? null;
    }

    public function __set($key, $value)
    {
        $this->isDirty = true;
        $this->data[$key] = $value;
    }

    protected static function tableName()
    {
        preg_match('#(?:[.*\\\\])([^\\\\]+)$#', get_called_class(), $matches);
        return 'd2ssa_' . strtolower($matches[1]) . 's';
    }

    public static function getAdditional() : array
    {
        return [];
    }

    public static function getWhere($where)
    {
        global $conn, $messages;

        $keys = implode(', ', array_merge(static::getFields(), static::getAdditional()));
        $table = static::tableName();
        $sql = "SELECT $keys FROM $table WHERE $where";

        $messages[] = $sql;

        $q = $conn->prepare($sql);
        $q->execute();

        $data = $q->fetchAll();
        $modelName = get_called_class();

        $models = [];

        foreach ($data as $model) {
            $m = new $modelName(null, false);
            foreach ($model as $key => $val) {
                $m->{$key} = $val;
            }

            $m->isDirty = false;

            $models[$m->id] = $m;
        }

        return $models;
    }

    public function create()
    {
        global $conn, $messages;

        $fields = [];
        foreach ($this->data as $key => $val) {
            if (in_array($key, static::getFields())) {
                $fields[] = $key;
            }
        }

        $keys = implode(', ', $fields);
        $values = implode(', ', array_map(function ($x) {return ":$x";}, $fields));
        $table = static::tableName();
        $sql = "INSERT INTO $table ($keys) VALUES ($values)";

        $messages[] = $sql;

        $q = $conn->prepare($sql);

        foreach (array_diff($this->data, static::getFields()) as $key => $value) {
            $q->bindValue(":$key", $value);
        }

        $q->execute();

        $this->isDirty = false;

        $this->getData($conn->lastInsertId());
    }

    public function save()
    {
        global $conn, $messages;

        $pairs = implode(', ', array_map(function ($x) {return "$x = :$x";}, array_diff(static::getFields(), ['id'])));
        $table = static::tableName();
        $sql = "UPDATE $table SET $pairs WHERE id=:id";

        $messages[] = $sql;

        $q = $conn->prepare($sql);

        foreach (array_diff(static::getFields(), ['id']) as $key) {
            $q->bindValue(":$key", $this->data[$key]);
        }

        $q->bindValue(':id', $this->id);

        $q->execute();

        $this->isDirty = false;
    }

    public function getData($id)
    {
        global $conn, $messages;

        $keys = implode(', ', array_merge(static::getFields(), static::getAdditional()));
        $table = static::tableName();
        $sql = "SELECT $keys FROM $table WHERE id = :id";

        $messages[] = $sql;

        $q = $conn->prepare($sql);
        $q->bindValue(':id', $id);
        $q->execute();

        $this->data = $q->fetch();
    }
}