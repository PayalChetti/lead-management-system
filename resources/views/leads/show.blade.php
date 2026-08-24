@extends('layouts.master')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">

            <h4>Lead Details</h4>

            <a href="{{ route('leads.index') }}" class="btn btn-light">
                Back
            </a>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4 mb-3">

                    <label><strong>Lead No</strong></label>

                    <p>{{ $lead->lead_no }}</p>

                </div>

                <div class="col-md-4 mb-3">

                    <label><strong>Name</strong></label>

                    <p>{{ $lead->name }}</p>

                </div>

                <div class="col-md-4 mb-3">

                    <label><strong>Company</strong></label>

                    <p>{{ $lead->company }}</p>

                </div>

                <div class="col-md-4 mb-3">

                    <label><strong>Email</strong></label>

                    <p>{{ $lead->email }}</p>

                </div>

                <div class="col-md-4 mb-3">

                    <label><strong>Phone</strong></label>

                    <p>{{ $lead->phone }}</p>

                </div>

                <div class="col-md-4 mb-3">

                    <label><strong>City</strong></label>

                    <p>{{ $lead->city }}</p>

                </div>

                <div class="col-md-12 mb-3">

                    <label><strong>Address</strong></label>

                    <p>{{ $lead->address }}</p>

                </div>

                <div class="col-md-4 mb-3">

                    <label><strong>Lead Source</strong></label>

                    <p>{{ $lead->leadSource->name ?? '-' }}</p>

                </div>

                <div class="col-md-4 mb-3">

                    <label><strong>Status</strong></label>

                    @if($lead->leadStatus)
                    <br>
                    <span class="badge bg-{{ $lead->leadStatus->color }}">
                        {{ $lead->leadStatus->name }}
                    </span>
                    @else
                    <p>-</p>
                    @endif

                </div>

                <div class="col-md-4 mb-3">

                    <label><strong>Assigned To</strong></label>

                    <p>{{ $lead->assignedUser->name ?? '-' }}</p>

                </div>

                <div class="col-md-4 mb-3">

                    <label><strong>Expected Value</strong></label>

                    <p>₹ {{ number_format($lead->expected_value,2) }}</p>

                </div>

                <div class="col-md-8 mb-3">

                    <label><strong>Remarks</strong></label>

                    <p>{{ $lead->remarks }}</p>

                </div>

                <div class="col-md-4">

                    <label><strong>Created At</strong></label>

                    <p>{{ $lead->created_at->format('d-m-Y h:i A') }}</p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
