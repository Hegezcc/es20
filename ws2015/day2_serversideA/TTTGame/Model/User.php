<?php

namespace TTTGame\Model;

class User extends Model implements ModelInterface  {
    protected static $fields = ['id', 'uniqid', 'avatar_set'];

    public function __construct() {
        parent::construct();
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