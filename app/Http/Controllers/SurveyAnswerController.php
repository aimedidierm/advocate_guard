<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Http\Requests\SurveyAnswerRequest;
use App\Models\SurveyAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == UserRole::COMMUNITY->value) {
            $surves = SurveyAnswer::where('user_id', Auth::id())->paginate(10);
            $surves->load('survey');
            return view('community.survey.answers', compact('surves'));
        } else {
            $surves = SurveyAnswer::paginate(10);
            $surves->load('survey', 'user');
            return view('admin.survey.answers', compact('surves'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SurveyAnswerRequest $request)
    {
        SurveyAnswer::create([
            'answers' => json_encode($request->input('answers')),
            'user_id' => Auth::id(),
            'survey_id' => $request->input('survey'),
        ]);

        return redirect('community/survey-answers')->with('success', 'Thank you for response!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        if (Auth::user()->role == UserRole::COMMUNITY->value) {
            $answer = SurveyAnswer::where('user_id', Auth::id())->where('id', $id)->first();
            $answer->load('survey');
            return view('community.survey.answer-details', compact('answer'));
        } elseif (Auth::user()->role == UserRole::ADMIN->value) {
            $answer = SurveyAnswer::where('id', $id)->first();
            $answer->load('survey');
            return view('admin.survey.answer-details', compact('answer'));
        } else {
            # code...
        }
    }
}
