<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'partners_employees';
    public $timestamps = false;

    protected $fillable = ['employees_id', 'partners_id', 'start_date', 'end_date', 'role'];

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'employees_id');
    }

    public function partner()
    {
        return $this->belongsTo('App\Partner', 'partners_id');
    }
}
