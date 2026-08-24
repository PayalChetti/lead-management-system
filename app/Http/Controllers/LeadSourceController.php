<?php

namespace App\Http\Controllers;

use App\Models\LeadSource;
use Illuminate\Http\Request;

class LeadSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sources = LeadSource::latest()->paginate(10);

        return view('lead_source.index', compact('sources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lead_source.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:lead_sources,name'
        ]);

        LeadSource::create($request->all());

        return redirect()->route('lead-source.index')
            ->with('success', 'Lead Source Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(LeadSource $leadSource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeadSource $leadSource)
    {
        return view('lead_source.edit', compact('leadSource'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LeadSource $leadSource)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $leadSource->update($request->all());

        return redirect()->route('lead-source.index')
            ->with('success', 'Lead Source Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeadSource $leadSource)
    {
        $leadSource->delete();

        return redirect()->route('lead-source.index')
            ->with('success', 'Lead Source Deleted Successfully');
    }
}
