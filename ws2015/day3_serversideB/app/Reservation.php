<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'organization', 'email', 'phone', 'country', 'is_group'];

    public function guests()
    {
        return $this->hasMany('App\Guest');
    }
}
