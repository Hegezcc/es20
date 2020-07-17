<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'email', 'gender', 'role'];

    public function contract()
    {
        return $this->hasOne('App\Contract', 'employees_id');
    }

    public function survey_fills()
    {
        return $this->hasMany('App\SurveyFill');
    }
}
