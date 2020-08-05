<?php

// The stock price is a range between $93.5 and $93.9.

// TODO
header('Content-Type: application/json');
echo json_encode([
    'time' => date('H:i, jS F, Y'),
    'price' => (float) ('93.' . rand(50, 90)),
]);