<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function getReservations(Request $request)
    {
        return view('management');
    }
}
