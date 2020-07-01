<?php

namespace TTTGame\Controller;

use TTTGame\Model\Match;
use TTTGame\Model\Move;
use TTTGame\Model\Score;

class GameController {
    public function index()
    {
        global $match;

        if ($match === null) {
            return [
                'type' => 'page',
                'content' => 'start',
            ];
        } else {
            return [
                'type' => 'page',
                'content' => 'game'
            ];
        }
    }

    public function upload()
    {
        global $user;

        if (!empty($_FILES['photo']) && !empty($_FILES['photo']['tmp_name'])) {
            // Process file, this is optional as user may not upload photo
            $photo = $_FILES['photo'];

            $check = getimagesize($photo['tmp_name']);
            if (!$check || $check['mime'] !== 'image/jpeg') {
                return [
                    'type' => 'page',
                    'content' => 'start',
                    'variables' => [
                        'image_error' => true
                    ],
                ];
            }

            $src = imagecreatefromjpeg($photo['tmp_name']);
            $dst = imagecreatetruecolor(60, 60);

            imagecopyresampled($dst, $src, 0, 0, 0, 0, 60, 60, $check[0], $check[1]);
            imagejpeg($dst, "pictures/{$user->uniqid}.jpg");

            imagedestroy($src);
            imagedestroy($dst);

            $user->avatar_set = true;
        }

        // Start new match
        $match = new Match();
        $match->user_id = $user->id;

        $match->create();

        return [
            'type' => 'redirect',
            'location' => '/'
        ];
    }

    public function reset()
    {
        global $match;
        $match->ended = true;
        $match->save();

        return [
            'type' => 'redirect',
            'location' => '/',
        ];
    }

    public function highscore()
    {
        global $user, $match, $state;

        if ($state['state'] !== 'win') {
            return [
                'type' => 'redirect',
                'location' => '/',
            ];
        }

        $nick = $_POST['nickname'] ?? null;

        if (empty($nick)) {
            return [
                'type' => 'refresh',
            ];
        }

        $score = new Score();
        $score->nickname = $nick;
        $score->game_clock = $match->game_clock;
        $score->score = $state['player_moves']['player'];
        $score->match_id = $match->id;
        $score->user_id = $user->id;

        $score->create();

        return $this->reset();
    }

    public static function calculateState($nextMove = null)
    {
        global $moves;

        // Copy array; no modifications to original
        $cmoves = $moves;

        if (!empty($nextMove)) {
            $cmoves[] = $nextMove;
        }

        $winning = [
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9],
            [1, 4, 7],
            [2, 5, 8],
            [3, 6, 9],
            [1, 5, 9],
            [3, 5, 7],
        ];

        $players = ["1", "0"];

        $state = 'unfinished';
        $player_moves = ['player' => 0, 'ai' => 0];

        foreach ($players as $is_player) {
            // Filter moves by player, then map by square id for easy comparison
            $grid = array_map(
                function ($x) {return (int) $x->square;},
                array_filter($cmoves,
                    function ($x) use ($is_player) {return $x->is_player === $is_player;}
                )
            );

            $player_moves[$is_player ? 'player' : 'ai'] = count($grid);

            if ($state === 'unfinished') {
                sort($grid);

                foreach ($winning as $row) {
                    // Check if any winning row matches (intersects) fully
                    if (count(array_intersect($row, $grid)) === 3) {
                        if ($is_player === "1") {
                            $state = 'win';
                            break;
                        } else {
                            $state = 'lose';
                            break;
                        }
                    }
                }
            }
        }

        // Tie condition
        if ($state === 'unfinished' && count($cmoves) === 9) {
            $state = 'lose';
        }

        return compact('state', 'player_moves');
    }
}