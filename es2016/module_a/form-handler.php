<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['data'] = json_decode(file_get_contents('php://input'), true);
} else {
    header('Content-Type: application/json');
    echo json_encode($_SESSION['data'], JSON_PRETTY_PRINT);
}