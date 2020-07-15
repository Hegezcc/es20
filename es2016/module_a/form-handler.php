<?php

// TODO: Receive the POST data from ticket form and dump all the received data out.

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['data'] = json_decode(file_get_contents('php://input'), true);
} else {
    echo '<pre>';
    var_dump($_SESSION['data']);
    echo '</pre>';
}