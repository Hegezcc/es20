<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Survey extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'identification',
        'password',
        'survey_title',
        'survey_description',
        'survey_type',
        'access',
        'file',
        'start_date',
        'end_date',
    ];

    protected $dates = ['start_date', 'end_date'];

    public function getAccessAttribute($val)
    {
        if ($val === null) return null;

        $accessors = explode(',', $val);

        return Employee::whereIn('id', $accessors)->get();
    }

    public function setAccessAttribute($val)
    {
        if ($val === null) return null;

        $this->attributes['access'] = implode(',', $val);
    }

    public function setPasswordAttribute($val)
    {
        $this->attributes['password'] = Hash::make($val);
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function survey_fills()
    {
        return $this->hasMany('App\SurveyFill');
    }
}
