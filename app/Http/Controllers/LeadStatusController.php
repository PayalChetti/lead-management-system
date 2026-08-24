<?php

namespace App\Http\Controllers;

use App\Models\LeadStatus;
use Illuminate\Http\Request;

class LeadStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = LeadStatus::latest()->paginate(10);

        return view('lead_status.index', compact('statuses'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lead_status.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:lead_statuses,name',
            'color' => 'required'
        ]);

        LeadStatus::create($request->all());

        return redirect()->route('lead-status.index')
            ->with('success', 'Status Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(LeadStatus $leadStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeadStatus $leadStatus)
    {
        return view('lead_status.edit', compact('leadStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LeadStatus $leadStatus)
    {
        $request->validate([
            'name' => 'required',
            'color' => 'required'
        ]);

        $leadStatus->update($request->all());

        return redirect()->route('lead-status.index')
            ->with('success', 'Status Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeadStatus $leadStatus)
    {
        $leadStatus->delete();

        return redirect()->route('lead-status.index')
            ->with('success', 'Status Deleted');
    }
}
