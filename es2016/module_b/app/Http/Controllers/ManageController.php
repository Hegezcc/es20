<?php

namespace App\Http\Controllers;

use App\Survey;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function getSurvey(Request $r, $identification)
    {
        $s = Survey::where('identification', $identification)->first();
        return view('manage', compact('s'));
    }

    public function logout()
    {
        session()->flush();

        return redirect()->route('index');
    }
}
