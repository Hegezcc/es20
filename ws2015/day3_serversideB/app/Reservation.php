<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['name', 'organization', 'email', 'phone', 'country', 'type'];

    public static $validation = ['name' => 'required',
        'organization' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'country' => 'required|string|in:AU,BR,CA,CH,CN,DE,FR,IN',
        'agree' => 'accepted'
    ];

    public function diningOptions()
    {
        return $this->belongsToMany('App\DiningOption', 'guests');
    }

    public function guests()
    {
        return $this->hasMany('App\Guest');
    }
}
