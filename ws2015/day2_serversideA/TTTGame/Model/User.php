<?php

namespace TTTGame\Model;

class User extends Model implements ModelInterface {
    public function __construct($id, $create = true)
    {
        $this->construct($id, $create);
    }

    public static function getFields() : array
    {
        return ['id', 'avatar', 'current_match_id'];
    }
}