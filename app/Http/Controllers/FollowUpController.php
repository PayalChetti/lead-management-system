<?php

namespace App\Http\Controllers;

use App\Models\FollowUp;
use Illuminate\Http\Request;
use App\Models\Lead;

class FollowUpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = FollowUp::with('lead');

        if ($request->search) {

            $query->whereHas('lead', function ($q) use ($request) {

                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        $followUps = $query->latest()->paginate(10);

        return view('follow-ups.index', compact('followUps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $leads = Lead::orderBy('name')->get();

        return view('follow-ups.create', compact('leads'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lead_id' => 'required',
            'followup_date' => 'required|date',
            'status' => 'required',
            'remarks' => 'required'
        ]);

        FollowUp::create([
            'lead_id' => $request->lead_id,
            'followup_date' => $request->followup_date,
            'remarks' => $request->remarks,
            'status' => $request->status,
        ]);

        return redirect()->route('follow-ups.index')
            ->with('success', 'Follow-up Added Successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(FollowUp $followUp)
    {
        $followUp->load('lead');

        return view('follow-ups.show', compact('followUp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FollowUp $followUp)
    {
        $leads = Lead::orderBy('name')->get();

        return view('follow-ups.edit', compact(
            'followUp',
            'leads'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FollowUp $followUp)
    {
        $request->validate([
            'lead_id' => 'required',
            'followup_date' => 'required|date',
            'status' => 'required',
            'remarks' => 'required'
        ]);

        $followUp->update([
            'lead_id' => $request->lead_id,
            'followup_date' => $request->followup_date,
            'status' => $request->status,
            'remarks' => $request->remarks,
        ]);

        return redirect()
            ->route('follow-ups.index')
            ->with('success', 'Follow-up Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FollowUp $followUp)
    {
        $followUp->delete();

        return redirect()
            ->route('follow-ups.index')
            ->with('success', 'Follow-up Deleted Successfully.');
    }
}
