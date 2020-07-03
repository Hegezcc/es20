<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'tables'];

    public function seatings()
    {
        return $this->hasMany('App\Seating');
    }

    public function getTablesAttribute($val)
    {
        return collect(explode(',', trim($val,'"')))->map(function ($x) {return (int) $x;});
    }

    public function setTablesAttribute($val)
    {
        $this->attributes['tables'] = $val->join(',');
    }
}
