<?php

namespace App\Http\Controllers;

use App\DiningExperience;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showDiningOptions(Request $request)
    {
        return view('information', ['experiences' => DiningExperience::all()]);
    }
}
