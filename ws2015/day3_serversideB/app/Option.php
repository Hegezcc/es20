<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $timestamps = false;
    protected $fillable = ['seating_id', 'day_id'];

    public function day()
    {
        return $this->belongsTo('App\Day');
    }

    public function seating()
    {
        return $this->belongsTo('App\Seating');
    }

    public function guests()
    {
        return $this->hasMany('App\Guest');
    }

    public function getAvailableAttribute()
    {
        return max(0, ((Competitors::first()->count-1) * $this->seating->experience->tables->sum()) - $this->guests()->count());
    }
}
