<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == UserRole::ADMIN->value) {
            $courses = Course::all();
            return view('admin.e-learning', compact('courses'));
        } elseif (Auth::user()->role == UserRole::COMMUNITY->value) {
            # code...
        } else {
            # code...
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        if ($request->input('adult') == 'y') {
            $adult = true;
        } else {
            $adult = false;
        }

        Course::create([
            "name" => $request->input('name'),
            "adult" => $adult,
            "description" => $request->input('description'),
        ]);

        return redirect('/admin/e-learning')->with('success', 'Course created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::find($id);
        $course->load('lessons');

        if ($course) {
            return view('admin.course.index', compact('course'));
        } else {
            return redirect()->back()->withErrors('Training not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);
        if ($course) {
            $course->delete();
            return redirect('/admin/e-learning')->with('success', 'Course deleted successfully.');
        } else {
            return redirect('/admin/e-learning')->withErrors('Course not found');
        }
    }
}
