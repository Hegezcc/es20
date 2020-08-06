<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyAccess extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function survey()
    {
        return $this->belongsTo('App\Survey');
    }
}
