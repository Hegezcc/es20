<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiningExperience extends Model
{
    public $timestamps = false;

    public function diningOptions()
    {
        return $this->hasMany('App\DiningOption');
    }
}
