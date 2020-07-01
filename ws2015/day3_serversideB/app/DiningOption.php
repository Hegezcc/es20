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

    public function availableForCountry($country)
    {
        return $this->available - $this->guests()->where('country', $country)->count();
    }

    public function getAvailableAttribute()
    {
        return max(0, ($this->guest_count * ($this->competitor_count)) - ($this->guests()->count() ?? 0));
    }

    public function guests()
    {
        return $this->hasMany('App\Guest');
    }

    public function day()
    {
        return $this->belongsTo('App\Day');
    }
}
