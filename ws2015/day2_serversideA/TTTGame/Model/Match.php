<?php

namespace TTTGame\Model;

class Match extends Model {
    public function __construct($id, $create = true)
    {
        $this->construct($id, $create);
    }

    public static function getFields() : array
    {
        return ['id', 'ended', 'start_time', 'access_time'];
    }

    public static function getAdditional(): array
    {
        return ['CURRENT_TIMESTAMP as now_time'];
    }
}