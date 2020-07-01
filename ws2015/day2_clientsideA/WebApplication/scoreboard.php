<?php

// Database parameters (may need to be modified)
$host = '127.0.0.1';
$port = 3306;
$database = 'ws2015';
$username = 'ws2015';
$password = 'ws2015';



$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
$params = "mysql:host=$host;dbname=$database;port=$port";

/**
 * CODE STARTS
 */

// Validate request

$post = $_SERVER['REQUEST_METHOD'] === 'POST';

if ($post) {
    $time = (int) $_POST['time'] ?? 0;
    $name = $_POST['name'];
    $difficulty = (int) $_POST['difficulty'] ?? 0;

    if ($time <= 0 || empty($name) || !in_array($difficulty, [1, 2, 3])) {
        http_response_code(400);
        exit();
    }

    // Request has valid data, insert it to DB

    $conn = new PDO($params, $username, $password, $options);

    $ins = $conn->prepare("INSERT INTO `ranking` (name, difficult_id, time) VALUES (:name, :difficult_id, SEC_TO_TIME(:time))");
    $ins->bindParam(':name', $name);
    $ins->bindParam(':difficult_id', $difficulty);
    $ins->bindParam(':time', $time);

    $ins->execute();

    $id = $conn->lastInsertId();
} else {
    // Just init connection
    $conn = new PDO($params, $username, $password, $options);
    $id = $_REQUEST['id'] ?? 0;

    if (empty($id)) {
        http_response_code(400);
        exit();
    }
}

// Select high scores and return those as response
$sel = $conn->prepare("
SELECT id, position, level, name, TIME_TO_SEC(time) AS time FROM 
	(
        SELECT ROW_NUMBER() OVER (ORDER BY time ASC) AS row, 
        DENSE_RANK() OVER (ORDER BY time ASC) AS position,
        difficult.name AS level, 
        ranking.name AS name, 
        ranking.id AS id, 
        time
        FROM `ranking` 
        LEFT JOIN `difficult` ON difficult.id = difficult_id 
        WHERE difficult_id = (SELECT difficult_id FROM `ranking` WHERE id = :id)
    ) AS t
    WHERE row < 4 OR id = :id");

$sel->bindParam(':id', $id);
$sel->execute();

header('Content-Type: application/json');
echo json_encode([
    'scoreboard' => $sel->fetchAll(),
    'last_id' => $id,
]);
