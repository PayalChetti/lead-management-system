<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\FollowUp;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalLeads' => Lead::count(),
            'newLeads' => Lead::where('status_id', 1)->count(),
            'contactedLeads' => Lead::where('status_id', 2)->count(),
            'qualifiedLeads' => Lead::where('status_id', 3)->count(),
            'wonLeads' => Lead::where('status_id', 4)->count(),
            'lostLeads' => Lead::where('status_id', 5)->count(),
            'todayFollowups' => FollowUp::whereDate('followup_date', today())->count(),
        ]);
    }
}
