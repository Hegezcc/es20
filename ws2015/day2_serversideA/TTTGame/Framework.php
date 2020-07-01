<?php

namespace TTTGame;

use PDO;
use TTTGame\Controller\GameController;
use TTTGame\Model\Match;
use TTTGame\Model\Move;
use TTTGame\Model\Score;
use TTTGame\Model\User;

class Framework {
    private $session;

    public function __construct()
    {
        global $conn;

        $host = Config::$db['host'];
        $database = Config::$db['database'];
        $port = Config::$db['port'];

        $params = "mysql:host=$host;dbname=$database;port=$port";
        $conn = new PDO($params, Config::$db['username'], Config::$db['password'], Config::$db['options']);

        $this->session = session_start();

        if (!isset($_SESSION['id'])) {
            $_SESSION['id'] = uniqid();
        }
    }

    public function run($path)
    {
        global $user, $match, $moves, $state, $debugmsg;

        $users = User::getWhere(['uniqid' => $_SESSION['id']]);

        if (empty($users)) {
            $user = new User();
            $user->uniqid = $_SESSION['id'];

            $user->create();
        } else {
            $user = $users[0];
        }

        $matches = Match::getWhere(['user_id' => $user->id, 'ended' => 0]);

        if (!empty($matches)) {
            $match = $matches[0];
            $moves = Move::getWhere(['match_id' => $match->id]);
            $state = GameController::calculateState();

            if ($state['state'] === 'unfinished') {
                $match->updateTimestamp();
            }
        } else {
            $match = null;
            $moves = null;
        }

        $scores = Score::getHighscores();

        foreach (Config::$routes as $route => $controller_name) {
            if (preg_match($route, $path, $pmatch)) {
                $controller_name = "TTTGame\\Controller\\$controller_name";
                $method_name = $pmatch[1];

                break;
            }
        }

        if (!isset($method_name)) {
            $controller_name = "TTTGame\\Controller\\GameController";
            $method_name = 'index';
        }

        $controller = new $controller_name;
        $result = call_user_func([$controller, $method_name]);

        if ($result['type'] === 'page') {
            // Views
            $files = ['template_begin', $result['content'], 'template_end'];

            $variables = $result['variables'] ?? [];

            foreach ($files as $file) {
                $path = __DIR__ . "\View\\$file.phtml";

                require($path);
            }
        } else if ($result['type'] === 'json') {
            header('Content-Type: application/json');
            echo json_encode($result['data']);
        } else if ($result['type'] === 'refresh') {
            header("Refresh:0");
        } else if ($result['type'] === 'redirect') {
            header("Location: {$result['location']}");
        }
    }

}