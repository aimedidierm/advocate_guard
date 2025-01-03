<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Http\Requests\LessonRequest;
use App\Models\Course;
use App\Models\Lesson;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == UserRole::COMMUNITY->value) {
            $courses = Course::where('adult', true)->with('lessons')->paginate(10);
        } else {
            $courses = Course::where('adult', false)->with('lessons')->paginate(10);
        }

        return view('e-learning.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LessonRequest $request)
    {
        $uniqueid = uniqid();
        $extension = $request->file('file')->getClientOriginalExtension();
        $filename = Carbon::now()->format('Ymd') . '_' . $uniqueid . '.' . $extension;

        $path = $request->file('file')->storeAs('files', $filename, 'public');
        $fileUrl = Storage::url($path);

        $uniqueid = uniqid();
        $extension = $request->file('image')->getClientOriginalExtension();
        $filename = Carbon::now()->format('Ymd') . '_' . $uniqueid . '.' . $extension;

        $path = $request->file('image')->storeAs('files', $filename, 'public');
        $imageFileUrl = Storage::url($path);

        Lesson::create([
            "title" => $request->input('title'),
            "description" => $request->input('description'),
            "src" => $fileUrl,
            "image" => $imageFileUrl,
            "course_id" => $request->input('course'),
        ]);

        return redirect('/admin/e-learning/course/' . $request->input('course'))->with('success', 'Training created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lesson = Lesson::find($id);
        $lesson->load('course');

        if ($lesson) {
            if (Auth::user()->role == UserRole::ADMIN->value) {
                return view('admin.course.lesson', compact('lesson'));
            } elseif (Auth::user()->role == UserRole::COMMUNITY->value) {
                return view('e-learning.show', compact('lesson'));
            } else {
                return view('e-learning.show', compact('lesson'));
            }
        } else {
            return redirect()->back()->withErrors('Lesson not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lesson = Lesson::find($id);
        $courseId = $lesson->course_id;
        if ($lesson) {
            $lesson->delete();
            return redirect('/admin/e-learning/course/' . $courseId)->with('success', 'Lesson deleted successfully.');
        } else {
            return redirect('/admin/e-learning')->withErrors('Lesson not found');
        }
    }
}
