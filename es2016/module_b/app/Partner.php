<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];

    public function employees()
    {
        return $this->belongsToMany('App\Employee', 'partners_employees', 'partners_id', 'employees_id');
    }
}
