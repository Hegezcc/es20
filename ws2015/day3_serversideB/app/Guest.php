<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = ['name', 'country', 'reservation_id', 'dining_option_id'];

    public function reservation()
    {
        return $this->belongsTo('App\Reservation');
    }

    public function diningOption()
    {
        return $this->belongsTo('App\DiningOption');
    }
}
