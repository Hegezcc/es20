<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Employee;
use App\Question;
use App\Survey;
use App\SurveyFill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SurveyController extends Controller
{
    public function index(Request $request)
    {
        $d = date('Y-m-d');
        $surveys = Survey::whereDate('start_date', '<= ', $d)->whereDate('end_date', '>=', $d)->get();

        return view('index', compact('surveys'));
    }

    public function getNewSurvey(Request $request)
    {
        return view('registerSurvey', ['employees' => Employee::all()]);
    }

    public function postNewSurvey(Request $request)
    {
        $data = $request->all();
        unset($data['question'][0]);
        unset($data['answer_type'][0]);
        unset($data['options_list'][0]);

        $validator = Validator::make($data, [
            "identification" => "required|string|unique:surveys",
            "password" => "required|string",
            "survey_title" => "required|string",
            "survey_description" => "nullable|string",
            "survey_type" => "required|in:public,restrict",
            "access" => "required_if:survey_type,restrict|array",
            "access.*" => "required_if:survey_type,restrict|string|exists:employees,id",
            "file" => "nullable|file|max:1024|mimes:png,jpeg",
            "start_date" => "required|date|before_or_equal:end_date",
            "end_date" => "required|date",
            "question.*" => "required|string",
            "answer_type.*" => "required|in:text,number,option",
            "options_list.*" => [function ($attr, $val, $fail) use ($request) {
                if ($request->input('answer_type.' . explode('.', $attr)[1]) === 'option') {
                    if (empty($val)) {
                        $fail($attr . ' must be a list when answer type is option.');
                    }
                } else if (!empty($val)) {
                    $fail($attr . ' must be empty when answer type is not option.');
                }
            }],
        ]);

        if ($validator->fails()) {
            return redirect()->route('newSurvey')->withErrors($validator)->withInput();
        }

        $file = null;

        if ($request->has('file')) {
            $file = $request->file('file')->store('public');
        }

        $s = new Survey([
            'identification' => $data['identification'],
            'password' => $data['password'],
            'survey_title' => $data['survey_title'],
            'survey_description' => $data['survey_description'],
            'survey_type' => $data['survey_type'],
            'access' => $data['access'] ?? null,
            'file' => $file,
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
        ]);

        $s->save();

        foreach ($data['question'] as $i => $question) {
            Question::insert([
                'title' => $question,
                'type' => $data['answer_type'][$i],
                'options_list' => $data['options_list'][$i],
                'survey_id' => $s->id,
            ]);
        }

        return redirect()->route('index')->with('manage_link', $data['identification']);
    }

    public function getSurvey(Request $request, $identification)
    {
        $s = Survey::where('identification', $identification)->first();

        if (!empty($s->access) && !$s->access->find(session('employee_id'))) {
            return redirect()->route('auth', $identification);
        }

        return view('survey', compact('s'));
    }

    public function postSurveyFill(Request $request, $identification)
    {
        $request->validate([
            'employee_id' => 'nullable|integer|exists:employees,id',
            'survey_id' => 'required|integer|exists:surveys,id',
            'answer' => 'required|array',
            'answer.*' => 'required|string',
        ]);


        $sf = new SurveyFill([
            'employee_id' => $request->input('employee_id'),
            'survey_id' => $request->input('survey_id'),
            'ip_address' => $_SERVER['REMOTE_ADDR'],
        ]);

        $sf->save();

        foreach ($request->input('answer') as $question => $answer) {
            Answer::insert([
                'answer' => $answer,
                'question_id' => $question,
                'survey_fill_id' => $sf->id,
            ]);
        }

        return redirect()->route('index');
    }

    public function getSurveyAuth(Request $request, $identification)
    {
        return view('restrictSurveyAccess', ['identification' => $identification, 'denied' => false]);
    }

    public function postSurveyAuth(Request $request, $identification)
    {
        $request->validate(['email' => 'required|email']);

        $eid = Employee::where('email', $request->input('email'))->pluck('id')->first();
        $s = Survey::where('identification', $identification)->first();

        if (empty($s->access) || $s->access->where('email', $request->input('email'))->first()) {
            // Good
            session(['employee_id' => $eid]);
            return redirect()->route('survey', $identification);
        } else {
            // Bad
            return view('error', ['error' => 'ACCESS NOT PERMITTED']);
        }
    }

}
