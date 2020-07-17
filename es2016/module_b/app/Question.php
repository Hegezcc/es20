<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'type',
        'options_list',
        'survey_id',
    ];

    public function survey()
    {
        return $this->belongsTo('App\Survey');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function getOptionsListAttribute($val)
    {
        if ($val === null) return null;

        return explode('|', $val);
    }
}
