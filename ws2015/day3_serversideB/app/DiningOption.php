<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiningOption extends Model
{
    public $timestamps = false;

    public function diningExperience()
    {
        return $this->belongsTo('App\DiningExperience');
    }

    public function getAvailableAttribute()
    {
        return max(0, 30 - ($this->guests()->count ?? 0));
    }

    public function guests()
    {
        return $this->hasMany('App\Guest');
    }
}
