<?php

namespace TTTGame;

class Config {
    public static $db = [
        'username' => 'ws2015',
        'password' => 'ws2015',
        'database' => 'ws2015',
        'host' => '127.0.0.1',
        'port' => 3306,
        'prefix' => 'd2_ssa_',
        'options' => [
            3 => 2,     // ERRMODE => EXCEPTION
            19 => 2,    // DEFAULT_FETCH_MODE => FETCH_ASSOC
        ]
    ];

    public static $routes = [
        '#^api/(.*)[^?]?#' => 'ApiController',
        '#^(.*)[^?]?#' => 'GameController',
    ];

    public static $debug = false;
};