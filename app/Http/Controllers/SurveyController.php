<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Http\Requests\SurveyRequest;
use App\Models\Survey;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == UserRole::ADMIN->value) {
            $surves = Survey::all();
            return view('admin.survey.index', compact('surves'));
        } elseif (Auth::user()->role == UserRole::COMMUNITY->value) {
            $surves = Survey::all();
            return view('community.survey.index', compact('surves'));
        } else {
            # code...
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SurveyRequest $request)
    {
        Survey::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'questions' => json_encode($request->input('questions')),
        ]);

        return redirect('/admin/survey')->with('success', 'Survey created');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $survey = Survey::find($id);

        if ($survey) {
            if (Auth::user()->role == UserRole::ADMIN->value) {
                return view('admin.survey.details', compact('survey'));
            } elseif (Auth::user()->role == UserRole::COMMUNITY->value) {
                return view('community.survey.details', compact('survey'));
            } else {
                # code...
            }
        } else {
            return redirect()->back()->withErrors('Survey not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }
}
