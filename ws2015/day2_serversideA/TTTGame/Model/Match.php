<?php

namespace TTTGame\Model;

class Match extends Model implements ModelInterface  {
    protected static $fields = ['id', 'started', 'last_move', 'ended', 'user_id'];
    protected static $computed = [
        'game_clock' => 'TIMESTAMPDIFF(SECOND, started, last_move)'
    ];
    protected static $table_name = 'matches';

    public function __construct()
    {
        parent::construct();
    }

    public function updateTimestamp()
    {
        global $conn;

        // Update
        $q = $conn->prepare("UPDATE {$this->table} SET last_move = CURRENT_TIMESTAMP() WHERE id = :id");

        $id = $this->id;

        $q->bindParam(':id', $id);
        $q->execute();

        // Select
        $q = $conn->prepare(static::_createQuery('select', [], ['id' => $this->id]));
        $q->bindParam(':id', $id);
        $q->execute();
        $data = $q->fetch();

        $this->_set_data('game_clock', $data['game_clock']);
    }
}