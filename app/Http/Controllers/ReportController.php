<?php

namespace App\Http\Controllers;

use App\Enums\ReportStatus;
use App\Enums\UserRole;
use App\Http\Requests\ReportRequest;
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
        } elseif (Auth::user()->role == UserRole::COMMUNITY->value) {
            $reports = Report::where('user_id', Auth::id())->get();
            return view('community.reports.index', compact('reports'));
        } else {
            $reports = Report::where('user_id', Auth::id())->get();
            return view('child.reports.index', compact('reports'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReportRequest $request)
    {
        $report = new Report();
        $report->subject = $request->subject;
        $report->description = $request->description;
        $report->victim = $request->victim;
        $report->location = $request->location;
        $report->when = $request->when;
        $report->leaning = $request->leaning;
        $report->category = $request->category;
        $report->user_id = Auth::id();
        if ($request->hasFile('attachments')) {
            $attachments = [];
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('attachments', 'public');
                $attachments[] = $path;
            }
            $report->attachments = json_encode($attachments);
        }

        $report->save();

        if (Auth::user()->role == UserRole::COMMUNITY->value) {
            return redirect('/community/reporting')->with('success', 'Report created successfully.');
        } elseif (Auth::user()->role == UserRole::CHILD->value) {
            return redirect('/child/reporting')->with('success', 'Report created successfully.');
        } else {
            # code...
        }
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
            } elseif (Auth::user()->role == UserRole::COMMUNITY->value) {
                return view('community.reports.details', compact('report'));
            } else {
                return view('child.reports.details', compact('report'));
            }
        } else {
            return redirect()->back()->withErrors('Report not found');
        }
    }

    public function viewed(int $id)
    {
        $report = Report::find($id);
        if ($report) {
            $report->status = ReportStatus::VIEWED->value;
            $report->update();
            return redirect('/admin/reporting')->with('success', 'Report updated successfully.');
        } else {
            return redirect('/admin/reporting')->withErrors('Report not found');
        }
    }

    public function resolved(int $id)
    {
        $report = Report::find($id);
        if ($report) {
            $report->status = ReportStatus::RESOLVED->value;
            $report->update();
            return redirect('/admin/reporting')->with('success', 'Report updated successfully.');
        } else {
            return redirect('/admin/reporting')->withErrors('Report not found');
        }
    }
}
