<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyFill extends Model
{
    protected $fillable = [
        'ip_address',
        'employee_id',
        'survey_id',
    ];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
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
