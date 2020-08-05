<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public $timestamps = false;

    protected $fillable = ['companyName', 'country'];

    public function contracts()
    {
        return $this->hasMany('App\Contract', 'partners_id');
    }
}
