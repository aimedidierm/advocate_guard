<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Lesson;
use App\Models\Report;
use App\Models\Survey;
use App\Models\SurveyAnswer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

        // Report statistics
        $totalReports = Report::count();
        $activeReports = Report::where('still_going', true)->count();
        $reportsByCategory = Report::select('type_abuse', DB::raw('count(*) as count'))
            ->groupBy('type_abuse')
            ->get();
        $reportsByProvince = Report::select('province', DB::raw('count(*) as count'))
            ->groupBy('province')
            ->get();
        $recentReports = Report::where('created_at', '>=', now()->subDays(7))->count(); // Reports in the last 7 days

        $reportsOverTime = Report::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('count(*) as count')
        )
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy(DB::raw('DATE(created_at)'), 'asc')
            ->pluck('count', 'date');

        return view('admin.dashboard', compact(
            'users',
            'campaigns',
            'surveys',
            'surveysAnswers',
            'campaignReach',
            'reports',
            'activeUsers',
            'totalReports',
            'activeReports',
            'reportsByCategory',
            'reportsByProvince',
            'recentReports',
            'reportsOverTime'
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

    public function landingPageResources()
    {
        $files = Storage::disk('public')->files('resources');

        $pdfFiles = collect($files)->filter(function ($file) {
            return strtolower(pathinfo($file, PATHINFO_EXTENSION)) === 'pdf';
        });

        return view('resources', ['pdfFiles' => $pdfFiles]);
    }
}
