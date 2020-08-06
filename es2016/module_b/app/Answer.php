<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];

    public function getFillAttribute($val)
    {
        return $this->belongsTo('App\Fill');
    }

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
