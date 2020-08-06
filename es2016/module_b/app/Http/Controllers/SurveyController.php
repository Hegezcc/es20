<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Employee;
use App\Fill;
use App\Question;
use App\Survey;
use App\SurveyAccess;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function getIndex()
    {
        $d = date('Y-m-d');
        $surveys = Survey::whereDate('start_date', '<=', $d)->whereDate('end_date', '>=', $d)->get();

        return view('index', compact('surveys'));
    }
    public function getNewSurvey()
    {
        $employees = Employee::all();
        return view('registerSurvey', compact('employees'));
    }

    public function postNewSurvey(Request $r)
    {
        $data = $r->validate([
            'identification' => 'required|unique:surveys',
            'password' => 'required',
            'title' => 'required',
            'description' => 'nullable',
            'file' => 'nullable|file|max:1024|mimes:jpeg,png',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date',
            'type' => 'required|in:public,restricted',
            'employees' => 'required_if:type,restricted|array',
            'employees.*' => 'required_if:type,restricted|integer',
            'question' => 'required|array',
            'question.*.question' => 'required|string',
            'question.*.type' => 'required|in:text,number,option',
            'question.*.options' => 'nullable|string',
        ]);

        if ($data['type'] === 'restricted') {
            $emps = $data['employees'];
            unset($data['employees']);
        }

        $questions = $data['question'];
        unset($data['question']);

        if (isset($data['file'])) {
            $data['file'] = $r->file->store('public');
        }

        $survey = Survey::create($data);

        Question::insert(array_map(function ($v) use ($survey) {
            return [
                'question' => $v['question'],
                'type' => $v['type'],
                'options' => $v['options'],
                'survey_id' => $survey->id
            ];
        }, $questions));

        if (isset($emps)) {
            SurveyAccess::insert(array_map(function ($v) use ($survey) {
                return ['survey_id' => $survey->id, 'employee_id' => $v];
            }, $emps));
        }

        $r->session()->flash('manage-link', $survey->identification);

        return redirect()->route('index');
    }

    public function getSurvey(Request $r, $identification)
    {
        $s = Survey::where('identification', $identification)->first();
        return view('survey', compact('s'));
    }

    public function postSurvey(Request $r, $identification)
    {
        $s = Survey::where('identification', $identification)->first();

        $f = Fill::create([
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'survey_id' => $s->id,
            'employee_id' => session('employee_id') ?? null,
        ]);

        $answers = [];

        foreach ($r->answer as $qid => $a) {
            $answers[] = [
                'question_id' => $qid,
                'fill_id' => $f->id,
                'answer' => $a
            ];
        }

        Answer::insert($answers);

        return redirect()->route('index');
    }

    public function getAuth(Request $r, $identification)
    {
        $old = session('survey-email') ?? null;
        $s = Survey::where('identification', $identification)->first();
        if ($this->authCheck($old, $s)) {
            return redirect('survey', ['identification' => $identification]);
        }

        return view('auth', ['type' => 'email']);
    }

    public function authCheck($email, $survey)
    {
        $eid = Employee::where('email', $email)->pluck('id');
        if ($survey->accesses->where('employee_id', $eid)->count() !== 0) {
            return true;
        }

        return false;
    }
}
