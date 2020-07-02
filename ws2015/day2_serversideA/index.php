<?php

spl_autoload_register(function ($path) {
    $dir = __DIR__;
    require_once "$dir/$path.php";
});

$framework = new \TTTGame\Kernel();
$path = explode('?', $_SERVER['REQUEST_URI'] ?? '/', 2)[0];
$framework->run($path);