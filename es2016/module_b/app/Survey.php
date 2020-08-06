<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Survey extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];

    public function setPasswordAttribute($val)
    {
        $this->attributes['password'] = Hash::make($val);
    }

    public function getFileAttribute()
    {
        if (isset($this->attributes['file'])) {
            return Storage::url($this->attributes['file']);
        } else {
            return route('base') . '/assets/img/default.png';
        }
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
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
