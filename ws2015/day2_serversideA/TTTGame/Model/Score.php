<?php

namespace TTTGame\Model;

use TTTGame\Config;

class Score extends Model implements ModelInterface {
    protected static $fields = ['id', 'nickname', 'game_clock', 'score', 'date', 'match_id', 'user_id'];
    protected static $computed = ['uniqid' => null, 'avatar_set' => null, 'position' => null];

    public function __construct() {
        parent::construct();
    }

    public function create()
    {
        global $conn;

        $data = [];

        foreach (static::$fields as $key) {
            if ($key !== 'date') {
                $data[$key] = $this->{$key};
            }
        }

        $q = $conn->prepare(static::_createQuery('insert', $data, null, null, null, ['date' => 'CURRENT_DATE']));

        foreach ($data as $key => $value) {
            $q->bindValue(":$key", $value);
        }

        $q->execute();

        $this->id = $conn->lastInsertId();
    }

    public static function getHighscores()
    {
        global $conn, $debugmsg;

        $table = Config::$db['prefix'] . 'scores';
        $usertable = Config::$db['prefix'] . 'users';

        $fields = implode(', ', array_merge(array_diff(static::$fields, ['id']), ['uniqid', 'avatar_set', 's.id as id']));
        $query = "SELECT $fields FROM $table AS s LEFT JOIN $usertable AS u ON s.user_id = u.id ORDER BY date DESC, id DESC";

        if (Config::$debug) {
            $debugmsg[] = $query;
        }

        $q = $conn->prepare($query);
        $q->execute();
        $data = $q->fetchAll();

        $classname = get_called_class();
        $models = [];

        $position = 1;

        foreach ($data as $item) {
            $obj = new $classname($conn);

            foreach ($item as $key => $value) {
                $obj->_set_data($key, $value);
            }

            $obj->_set_data('position', $position++);

            $models[] = $obj;
        }

        return $models;
    }

    public function getAvatar()
    {
        if ($this->avatar_set) {
            return "pictures/{$this->uniqid}.jpg";
        } else {
            return "uploads/photo.jpg";
        }
    }
}