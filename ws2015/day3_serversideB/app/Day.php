<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public $timestamps = false;

    public function diningOptions()
    {
        return $this->hasMany('App\DiningOption');
    }
}
