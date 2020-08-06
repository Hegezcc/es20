<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];

    public function getOptionsAttribute()
    {
        if (isset($this->attributes['options'])) {
            return explode('|', $this->attributes['options']);
        }

        return null;
    }

    public function survey()
    {
        return $this->belongsTo('App\Survey');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
