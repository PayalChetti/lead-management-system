@extends('layouts.master')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">Follow-up Details</h4>

            <a href="{{ route('follow-ups.index') }}" class="btn btn-light">
                Back
            </a>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label><strong>Lead</strong></label>

                    <p>{{ $followUp->lead->name ?? '-' }}</p>

                </div>

                <div class="col-md-6 mb-3">

                    <label><strong>Follow-up Date</strong></label>

                    <p>{{ \Carbon\Carbon::parse($followUp->followup_date)->format('d-m-Y') }}</p>

                </div>

                <div class="col-md-6 mb-3">

                    <label><strong>Status</strong></label>

                    @if($followUp->status=='Pending')

                    <br>
                    <span class="badge bg-warning text-dark">
                        Pending
                    </span>

                    @elseif($followUp->status=='Completed')

                    <br>
                    <span class="badge bg-success">
                        Completed
                    </span>

                    @else

                    <br>
                    <span class="badge bg-danger">
                        Missed
                    </span>

                    @endif

                </div>

                <div class="col-md-12 mb-3">

                    <label><strong>Remarks</strong></label>

                    <p>{{ $followUp->remarks }}</p>

                </div>

                <div class="col-md-6">

                    <label><strong>Created At</strong></label>

                    <p>{{ $followUp->created_at->format('d-m-Y h:i A') }}</p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
