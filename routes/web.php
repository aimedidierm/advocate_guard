<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SurveyAnswerController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ChildMiddleware;
use App\Http\Middleware\CommunityMiddleware;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

Route::group(
    ["middleware" => SetLocale::class],
    function () {
        Route::get('/switch-language/{lang}', function ($lang) {
            if (in_array($lang, ['en', 'rw'])) {
                session(['locale' => $lang]);
            }
            return redirect()->back();
        });

        Route::get('/', function () {
            return view('welcome');
        });

        Route::view('/login', 'auth.login')->name('login');
        Route::get('/campaign', [CampaignController::class, 'landingPage']);
        Route::get('/campaign-details/{id}', [CampaignController::class, 'campaignDetails']);
        Route::view('/resources', 'resources');
        Route::view('/contact-us', 'contact-us');

        Route::group(
            ["prefix" => "auth", "as" => "auth."],
            function () {
                Route::view('/register', 'auth.register');
                Route::post('/register', [AuthController::class, 'register']);
                Route::post('/login', [AuthController::class, 'login']);
                Route::get('/logout', [AuthController::class, 'logout']);
                Route::put('/settings', [UserController::class, 'update']);
            }
        );

        Route::group(
            ["prefix" => "admin", "middleware" => AdminMiddleware::class, "as" => "admin."],
            function () {
                Route::get('/', [DashboardController::class, 'admin']);
                Route::resource('/e-learning', CourseController::class)->only('index', 'store', 'destroy');
                Route::get('/e-learning/course/{id}', [CourseController::class, 'show']);
                Route::resource('/e-learning/course/lesson', LessonController::class)->only('index', 'store', 'show', 'destroy');
                Route::resource('/users', UserController::class)->only('index', 'destroy');
                Route::resource('/reporting', ReportController::class)->only('index', 'show');
                Route::get('/reporting-status/viewed/{id}', [ReportController::class, 'viewed']);
                Route::get('/reporting-status/resolved/{id}', [ReportController::class, 'resolved']);
                Route::view('/settings', 'auth.profile');
                Route::resource('/survey', SurveyController::class)->only('index', 'show', 'store', 'destroy');
                Route::resource('/survey-answers', SurveyAnswerController::class)->only('index', 'show');
                Route::resource('/campaign', CampaignController::class)->only('index', 'show', 'store', 'destroy');
                Route::get('/campaign-launch/{id}', [CampaignController::class, 'launch']);
            }
        );

        Route::group(
            ["prefix" => "community", "middleware" => CommunityMiddleware::class, "as" => "community."],
            function () {
                Route::get('/', [DashboardController::class, 'community']);
                Route::resource('/reporting', ReportController::class)->only('index', 'show', 'store');
                Route::get('/e-learning', [LessonController::class, 'index']);
                Route::get('/lessons/{id}', [LessonController::class, 'show'])->name('lessons.show');
                Route::view('/settings', 'auth.profile');
                Route::resource('/survey', SurveyController::class)->only('index', 'show');
                Route::resource('/survey-answers', SurveyAnswerController::class)->only('index', 'show', 'store');
            }
        );

        Route::group(
            ["prefix" => "child", "middleware" => ChildMiddleware::class, "as" => "child."],
            function () {
                Route::get('/', [DashboardController::class, 'child']);
                Route::resource('/reporting', ReportController::class)->only('index', 'show', 'store');
                Route::get('/e-learning', [LessonController::class, 'index']);
                Route::get('/lessons/{id}', [LessonController::class, 'show'])->name('lessons.show');
                Route::view('/settings', 'auth.profile');
            }
        );

        Route::group(
            ["prefix" => "platform", "middleware:auth", "as" => "platform."],
            function () {
                Route::get('/', [PostController::class, 'index'])->name('posts.index');
                Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
                Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
                Route::post('/posts/{post}/comment', [PostController::class, 'comment'])->name('posts.comment');
            }
        );
    }
);
