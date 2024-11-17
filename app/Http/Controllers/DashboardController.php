<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Lesson;
use App\Models\Report;
use App\Models\Survey;
use App\Models\SurveyAnswer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        $users = User::count();
        $campaigns = Campaign::count();
        $surveys  = Survey::count();
        $reports  = Report::count();
        $surveysAnswers = SurveyAnswer::count();
        $campaignReach = User::count();
        $activeUsers = User::count();
        return view('admin.dashboard', compact(
            'users',
            'campaigns',
            'surveys',
            'surveysAnswers',
            'campaignReach',
            'reports',
            'activeUsers'
        ));
    }

    public function child()
    {
        $reportData = [
            'sessions' => User::count(),
            'modules_completed' => Lesson::count(),
            'reports_generated' => Report::where('user_id', Auth::id())->count(),

        ];

        return view('child.dashboard', compact('reportData'));
    }

    public function community()
    {
        $reportData = [
            'total_surveys' => Survey::count(),
            'answered_surveys' => SurveyAnswer::where('user_id', Auth::id())->count(),
            'active_users' => User::count(),
            'e_learning_modules' => Lesson::count(),
        ];

        return view('community.dashboard', compact('reportData'));
    }
}
