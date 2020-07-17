<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'answer',
        'question_id',
        'survey_fill_id',
    ];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function survey_fill()
    {
        return $this->belongsTo('App\SurveyFill');
    }
}
