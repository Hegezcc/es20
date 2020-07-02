<?php

namespace TTTGame\Model;

class Move extends Model implements ModelInterface {
    public function __construct($id, $create = true)
    {
        $this->construct($id, $create);
    }

    public static function getFields() : array
    {
        return ['id', 'match_id', 'square_id', 'is_player'];
    }

    public static function getMoves($where)
    {
        $models = static::getWhere($where);

        $moves = [];

        for ($i = 0; $i < 9; $i++) {
            $id = $i+1;

            $move = new Move(null, false);

            foreach (static::getFields() as $key) {
                $move->{$key} = null;
            }

            $move->square_id = $id;
            $move->isDirty = false;

            $moves[$id] = $move;
        }

        foreach ($models as $model) {
            $moves[$model->square_id] = $model;
        }

        return $moves;
    }
}