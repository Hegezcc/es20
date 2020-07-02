<?php

namespace TTTGame;
use PDO;

class Config {
    public static $debug = false;

    public static $db = [
        'host' => '127.0.0.1',
        'database' => 'ws2015',
        'port' => 3306,
        'username' => 'ws2015',
        'password' => 'ws2015',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ],
    ];
}
