<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\LeadSource;
use App\Models\LeadStatus;
use App\Models\User;
use App\Exports\LeadsExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Lead::with(['leadStatus', 'leadSource', 'assignedUser']);

        if ($request->search) {
            $query->where(function ($q) use ($request) {

                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('phone', 'like', '%' . $request->search . '%');
            });
        }

        $leads = $query->latest()->paginate(10);

        return view('leads.index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = LeadStatus::where('is_active', 1)->get();
        $sources = LeadSource::where('is_active', 1)->get();
        $users = User::all();

        return view('leads.create', compact(
            'statuses',
            'sources',
            'users'
        ));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'phone' => 'required|digits:10',
            'email' => 'nullable|email',
            'source_id' => 'required',
            'status_id' => 'required',
        ]);

        Lead::create([
            'lead_no' => 'LD' . time(),
            'name' => $request->name,
            'company' => $request->company,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
            'source_id' => $request->source_id,
            'status_id' => $request->status_id,
            'assigned_to' => $request->assigned_to,
            'expected_value' => $request->expected_value,
            'remarks' => $request->remarks,
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('leads.index')
            ->with('success', 'Lead Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        $lead->load('leadStatus', 'leadSource', 'assignedUser');

        return view('leads.show', compact('lead'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        $statuses = LeadStatus::where('is_active', 1)->get();
        $sources = LeadSource::where('is_active', 1)->get();
        $users = User::all();

        return view('leads.edit', compact(
            'lead',
            'statuses',
            'sources',
            'users'
        ));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function exportExcel()
    {
        return Excel::download(
            new LeadsExport,
            'Leads.xlsx'
        );
    }

    public function exportPdf()
    {
        $leads = Lead::all();

        $pdf = Pdf::loadView(
            'leads.pdf',
            compact('leads')
        );

        return $pdf->download('Leads.pdf');
    }
}
