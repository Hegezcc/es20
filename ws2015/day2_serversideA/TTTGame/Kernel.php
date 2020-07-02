<?php

namespace TTTGame;

use PDO;
use TTTGame\Model\Match;
use TTTGame\Model\Move;
use TTTGame\Model\User;

class Kernel {
    public function __construct()
    {
        global $conn;

        $host = Config::$db['host'];
        $database = Config::$db['database'];
        $port = Config::$db['port'];

        $params = "mysql:host=$host;dbname=$database;port=$port";
        $conn = new PDO($params, Config::$db['username'], Config::$db['password'], Config::$db['options']);

        session_start();
    }

    public function run($path)
    {
        global $messages, $user;

        $user = new User($_SESSION['user_id'] ?? null);
        $_SESSION['user_id'] = $user->id;

        // Upload profile pic
        $upload_ok = true;
        if (!empty($_FILES['photo']) && !empty($_FILES['photo']['tmp_name'])) {
            $upload_ok = Controller::upload($_FILES['photo']);
        }

        $pageName = 'frontpage';

        if (isset($_REQUEST['start'])) {
            $match = new Match(null);
            $user->current_match_id = $match->id;
        }

        if (isset($_REQUEST['restart'])) {
            $old_match = new Match($user->current_match_id);
            $old_match->ended = 1;
            $user->current_match_id = null;

            header('Location: /');
            exit();
        }

        if (isset($_REQUEST['move'])) {
            $new_move = new Move(null, false);
            $new_move->square_id = $_REQUEST['move'];
            $new_move->is_player = 1;
            $new_move->match_id = $user->current_match_id;
            $new_move->create();

            $_SESSION['make_ai_move'] = true;

            header('Location: /');
            exit();
        }

        if ($user->current_match_id) {
            $match = new Match($user->current_match_id);
            $match->access_time = $match->now_time;

            $moves = Move::getMoves("match_id = $user->current_match_id");
            $pageName = 'game';

            if (isset($_SESSION['make_ai_move'])) {
                header('Refresh: 2');
            }
        }

        require(__DIR__ . '/Template/begin.phtml');
        require(__DIR__ . "/Template/$pageName.phtml");
        require(__DIR__ . '/Template/end.phtml');

        if (Config::$debug) {
            $messages[] = print_r($user ?? null, true);
            $messages[] = print_r($match ?? null, true);
            $messages[] = print_r($moves ?? null, true);

            echo '<pre>' .  implode("\n", $messages) . '</pre>';
        }

        if (isset($_SESSION['make_ai_move'])) {
            unset($_SESSION['make_ai_move']);

            $possible = array_filter($moves, function ($x) {
                return $x->id === null;
            });

            if (!empty($possible)) {
                $move = $possible[array_rand($possible)];
                $move->is_player = 0;
                $move->match_id = $user->current_match_id;

                $move->create();
            }
        }
    }
}