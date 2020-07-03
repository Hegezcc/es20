<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'country', 'status', 'option_id', 'reservation_id'];

    public function reservation()
    {
        return $this->belongsTo('App\Reservation');
    }

    public function option()
    {
        return $this->belongsTo('App\Option');
    }
}
