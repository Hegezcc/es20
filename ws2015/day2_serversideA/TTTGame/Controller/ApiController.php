<?php

namespace TTTGame\Controller;

use TTTGame\Model\Move;

class ApiController {
    public function move()
    {
        global $match, $moves, $state;

        $id = (int)$_POST['id'] ?? 0;

        if ($id === 0) {
            $ok = false;
        } else {
            $ok = true;
        }

        if ($ok) {
            foreach ($moves as $move) {
                if ($move->square === $id) {
                    $ok = false;
                    break;
                }
            }
        }

        if ($ok) {
            $move = new Move();
            $move->square = $id;
            $move->is_player = "1";
            $move->match_id = $match->id;
            $move->create();

            $moves[] = $move;

            $state = GameController::calculateState();

            if ($state['state'] === 'unfinished') {
                // Calculate AI move: random square
                $possible = [1, 2, 3, 4, 5, 6, 7, 8, 9];
                $used = array_map(function ($x) {return $x->square;}, $moves);

                // Remove used squares, then get random square
                $possible = array_merge(array_diff($possible, $used));
                $id = $possible[array_rand($possible)];

                $ai_move = new Move();
                $ai_move->square = $id;
                $ai_move->is_player = "0";
                $ai_move->match_id = $match->id;
                $ai_move->create();

                $ai_state = GameController::calculateState($ai_move);
                $ai_move = $ai_move->serialize();
            }
        }

        return [
            'type' => 'json',
            'data' => [
                'ok' => $ok,
                'moves' => array_map(function ($x) {return $x->serialize();}, $moves),
                'match' => $match->serialize(),
                'ai' => [
                    'move' => $ai_move ?? null,
                    'state' => $ai_state ?? null,
                ],
                'state' => $state ?? null,
            ]
        ];
    }


}