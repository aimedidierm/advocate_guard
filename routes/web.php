<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/login', 'auth.login')->name('login');

Route::group(
    ["prefix" => "auth", "as" => "auth."],
    function () {
        Route::view('/register', 'auth.register');
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/login', [AuthController::class, 'login']);
        Route::get('/logout', [AuthController::class, 'logout']);
    }
);

Route::group(
    ["prefix" => "admin", "middleware:auth", "as" => "admin."],
    function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        });
        Route::resource('/e-learning', CourseController::class)->only('index', 'store', 'destroy');
        Route::get('/e-learning/course/{id}', [CourseController::class, 'show']);
        Route::resource('/e-learning/course/lesson', LessonController::class)->only('index', 'store', 'show', 'destroy');
        Route::resource('/users', UserController::class)->only('index', 'destroy');
        Route::resource('/reporting', ReportController::class)->only('index', 'show');
    }
);

Route::group(
    ["prefix" => "community", "middleware:auth", "as" => "community."],
    function () {
        Route::get('/', function () {
            return view('community.dashboard');
        });
        Route::resource('/reporting', ReportController::class)->only('index', 'show', 'store');
        Route::get('/e-learning', [LessonController::class, 'index']);
        Route::get('/lessons/{id}', [LessonController::class, 'show'])->name('lessons.show');
    }
);

Route::group(
    ["prefix" => "child", "middleware:auth", "as" => "child."],
    function () {
        Route::get('/', function () {
            return view('child.dashboard');
        });
        Route::resource('/reporting', ReportController::class)->only('index', 'show', 'store');
        Route::get('/e-learning', [LessonController::class, 'index']);
        Route::get('/lessons/{id}', [LessonController::class, 'show'])->name('lessons.show');
    }
);
