<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\LeadStatus;
use App\Models\LeadSource;
use App\Models\FollowUp;
use App\Models\User;


class ReportController extends Controller
{


    public function index()
    {
        return view('reports.index');
    }

    public function revenueReport(Request $request)
    {
        $query = Lead::with('leadStatus');

        if ($request->filled('status_id')) {
            $query->where('status_id', $request->status_id);
        }

        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        $leads = $query->paginate(10);

        $totalRevenue = $query->sum('expected_value');

        $wonStatus = LeadStatus::where('name', 'Won')->first();
        $lostStatus = LeadStatus::where('name', 'Lost')->first();

        $wonRevenue = $wonStatus
            ? Lead::where('status_id', $wonStatus->id)->sum('expected_value')
            : 0;

        $lostRevenue = $lostStatus
            ? Lead::where('status_id', $lostStatus->id)->sum('expected_value')
            : 0;

        $statuses = LeadStatus::all();

        return view('reports.revenue_report', compact(
            'leads',
            'statuses',
            'totalRevenue',
            'wonRevenue',
            'lostRevenue'
        ));
    }

    public function followupReport(Request $request)
    {
        $query = FollowUp::with(['lead', 'user']);

        if ($request->filled('from_date')) {
            $query->whereDate('followup_date', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $query->whereDate('followup_date', '<=', $request->to_date);
        }

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $followups = $query->latest()->paginate(10);

        $users = User::all();

        return view('reports.followup_report', compact(
            'followups',
            'users'
        ));
    }

    public function sourceReport()
    {
        $sources = LeadSource::withCount('leads')->get();

        return view('reports.source_report', compact('sources'));
    }

    public function leadSummary(Request $request)
    {
        $query = Lead::with([
            'leadStatus',
            'leadSource',
            'assignedUser'
        ]);

        if ($request->filled('status_id')) {
            $query->where('status_id', $request->status_id);
        }

        if ($request->filled('source_id')) {
            $query->where('source_id', $request->source_id);
        }

        if ($request->filled('assigned_to')) {
            $query->where('assigned_to', $request->assigned_to);
        }

        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        $leads = $query->latest()->paginate(10);

        return view('reports.lead_summary', [
            'leads' => $leads,
            'statuses' => LeadStatus::all(),
            'sources' => LeadSource::all(),
            'users' => User::all(),
        ]);
    }
}
