<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seating extends Model
{
    public $timestamps = false;
    protected $fillable = ['time', 'experience_id'];

    public function experience()
    {
        return $this->belongsTo('App\Experience');
    }

    public function options()
    {
        return $this->hasMany('App\Option');
    }
}
