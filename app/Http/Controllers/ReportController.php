<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == UserRole::ADMIN->value) {
            $reports = Report::all();
            return view('admin.reports.index', compact('reports'));
        } else {
            # code...
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $report = Report::find($id);
        $report->load('user');
        if ($report) {
            if (Auth::user()->role == UserRole::ADMIN->value) {
                return view('admin.reports.details', compact('report'));
            } else {
                # code...
            }
        } else {
            return redirect()->back()->withErrors('Report not found');
        }
    }
}
