<?php

// TODO: Receive the POST data from ticket form and dump all the received data out.
header('Content-Type: application/json');
$data = $_POST['ticket'];

foreach ($data as $k => $v) {
    $data[$k]['fastpass'] = isset($v['fastpass']);
}

echo json_encode($data, JSON_PRETTY_PRINT);