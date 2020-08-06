<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fill extends Model
{
    protected $guarded = ['id'];

    public function survey()
    {
        return $this->belongsTo('App\Survey');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
