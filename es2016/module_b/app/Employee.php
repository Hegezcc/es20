<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];

    public function partners()
    {
        return $this->belongsToMany('App\Partner', 'partners_employees', 'employees_id', 'partners_id');
    }

    public function fills()
    {
        return $this->hasMany('App\Fill');
    }

    public function accesses()
    {
        return $this->hasMany('App\SurveyAccess');
    }
}
