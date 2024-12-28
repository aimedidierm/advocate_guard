<?php

namespace App\Http\Controllers;

use App\Enums\ReportStatus;
use App\Enums\UserRole;
use App\Http\Requests\ReportRequest;
use App\Mail\ReportAbuseMail;
use App\Mail\ResolvedReportAbuseMail;
use App\Mail\ViewedReportAbuseMail;
use App\Models\Report;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == UserRole::ADMIN->value) {
            $reports = Report::paginate(10);
            return view('admin.reports.index', compact('reports'));
        } elseif (Auth::user()->role == UserRole::COMMUNITY->value) {
            $reports = Report::where('user_id', Auth::id())->paginate(10);
            return view('community.reports.index', compact('reports'));
        } else {
            $reports = Report::where('user_id', Auth::id())->paginate(10);
            return view('child.reports.index', compact('reports'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReportRequest $request)
    {
        $report = new Report();
        $report->type_abuse = $request->type_abuse; // Updated field
        $report->description = $request->description;
        $report->province = $request->province;      // New field
        $report->district = $request->district;      // New field
        $report->sector = $request->sector;          // New field
        $report->date_incident = $request->date_incident; // Updated field
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

        $adminDetails = User::where('role', UserRole::ADMIN->value)->first();
        Mail::to($adminDetails->email)->send(new ReportAbuseMail($report));

        // Redirect based on user role
        if (Auth::user()->role == UserRole::COMMUNITY->value) {
            return redirect('/community/reporting')->with('success', 'Report created successfully.');
        } elseif (Auth::user()->role == UserRole::CHILD->value) {
            return redirect('/child/reporting')->with('success', 'Report created successfully.');
        } else {
            return redirect()->route('report.index')->with('success', 'Report created successfully.'); // For ADMIN
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

            $userDetails = User::find($report->user_id);
            Mail::to($userDetails->email)->send(new ViewedReportAbuseMail($report));

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

            $userDetails = User::find($report->user_id);
            Mail::to($userDetails->email)->send(new ResolvedReportAbuseMail($report));

            return redirect('/admin/reporting')->with('success', 'Report updated successfully.');
        } else {
            return redirect('/admin/reporting')->withErrors('Report not found');
        }
    }

    public function generatePDF()
    {
        $reports = Report::all();
        $pdf = Pdf::loadView('pdf.report', compact('reports'));
        return $pdf->download('reports.pdf');
    }
}
