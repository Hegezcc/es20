<?php

namespace TTTGame\Model;

class Score extends Model implements ModelInterface {
    public function __construct($id, $create = true)
    {
        $this->construct($id, $create);
    }

    public static function getFields() : array
    {
        return ['id', 'nick', 'avatar', 'score'];
    }
}