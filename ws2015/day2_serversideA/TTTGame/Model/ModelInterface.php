<?php

namespace TTTGame\Model;

interface ModelInterface {
    function __construct($id, $create = true);
    static function getFields() : array;
}