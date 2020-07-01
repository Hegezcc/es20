<?php

spl_autoload_register(function ($class) {
    // Replace hack should make this code work also on *nix
    $path = __DIR__ . "\\$class.php";
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);
    require_once $path;
});

$framework = new \TTTGame\Framework();

$framework->run($_GET['_path'] ?? 'index');