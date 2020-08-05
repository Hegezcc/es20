<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageController extends Controller
{
    public function getSurvey(Request $request, $identification)
    {
        $s = Survey::where('identification', $identification)->first();

        if (!$s) {
            return view('error', ['error' => 'This survey does not exist.']);
        }

        if (session('manage_identification') !== $identification) {
            return redirect()->route('manage.auth', $identification);
        }

        return view('manage', compact('s'));
    }

    public function getAuth(Request $request, $identification)
    {
        $s = Survey::where('identification', $identification)->first();

        if (!$s) {
            return view('error', ['error' => 'This survey does not exist.']);
        }

        return view('manageSurveyAccess', ['identification' => $identification, 'denied' => false]);
    }

    public function postAuth(Request $request, $identification)
    {
        $request->validate(['password' => 'required|string']);

        $s = Survey::where('identification', $identification)->first();

        if (!$s) {
            return view('error', ['error' => 'ACCESS NOT PERMITTED']);
        }

        if (Hash::check($request->input('password'), $s->password)) {
            // Good
            session(['manage_identification' => $identification]);
            return redirect()->route('manage', $identification);
        } else {
            // Bad
            return view('error', ['error' => 'ACCESS NOT PERMITTED']);
        }
    }

    public function logout(Request $request)
    {
        session()->flush();
        return redirect()->route('index');
    }

    public function getDelete(Request $request, $identification)
    {
        return view('deleteSurvey', compact('identification'));
    }

    public function postDelete(Request $request, $identification)
    {

        $s = Survey::where('identification', $identification)->first();

        if (!$s) {
            return view('error', ['error' => 'This survey does not exist.']);
        }

        $s->delete();

        session()->forget(['manage_identification']);

        return redirect()->route('index');
    }
}
