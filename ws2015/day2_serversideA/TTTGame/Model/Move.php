<?php

namespace TTTGame\Model;

class Move extends Model implements ModelInterface  {
    protected static $fields = ['id', 'square', 'match_id', 'is_player'];

    public function __construct() {
        parent::construct();
    }
}