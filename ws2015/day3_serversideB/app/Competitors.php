<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competitors extends Model
{
    public $timestamps = false;
    protected $fillable = ['count'];
}
