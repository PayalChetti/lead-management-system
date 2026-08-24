@extends('layouts.master')

@section('content')

<div class="container-fluid">

    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="fw-bold">
                <i class="fa fa-chart-bar text-primary"></i>
                Reports Dashboard
            </h2>
            <p class="text-muted">
                View CRM Reports and Analytics
            </p>
        </div>
    </div>

    <div class="row">

        <!-- Lead Summary -->
        <div class="col-md-4 mb-4">
            <div class="card shadow border-primary h-100">
                <div class="card-body text-center">

                    <i class="fa fa-users fa-3x text-primary mb-3"></i>

                    <h5>Lead Summary</h5>

                    <p class="text-muted">
                        View all leads with filters.
                    </p>

                    <a href="{{ route('reports.lead-summary') }}"
                        class="btn btn-primary">
                        Open Report
                    </a>

                </div>
            </div>
        </div>

        <!-- Status Report -->
        <div class="col-md-4 mb-4">
            <div class="card shadow border-success h-100">
                <div class="card-body text-center">

                    <i class="fa fa-chart-pie fa-3x text-success mb-3"></i>

                    <h5>Lead Status Report</h5>

                    <p class="text-muted">
                        Leads grouped by status.
                    </p>

                    <a href="{{ route('reports.status') }}"
                        class="btn btn-success">
                        Open Report
                    </a>

                </div>
            </div>
        </div>

        <!-- Source Report -->
        <div class="col-md-4 mb-4">
            <div class="card shadow border-info h-100">
                <div class="card-body text-center">

                    <i class="fa fa-globe fa-3x text-info mb-3"></i>

                    <h5>Lead Source Report</h5>

                    <p class="text-muted">
                        Analyze lead sources.
                    </p>

                    <a href="{{ route('reports.source') }}"
                        class="btn btn-info text-white">
                        Open Report
                    </a>

                </div>
            </div>
        </div>

        <!-- Follow-up -->
        <div class="col-md-4 mb-4">
            <div class="card shadow border-warning h-100">
                <div class="card-body text-center">

                    <i class="fa fa-calendar-check fa-3x text-warning mb-3"></i>

                    <h5>Follow-up Report</h5>

                    <p class="text-muted">
                        Upcoming and completed follow-ups.
                    </p>

                    <a href="{{ route('reports.followup') }}"
                        class="btn btn-warning">
                        Open Report
                    </a>

                </div>
            </div>
        </div>

        <!-- Revenue -->
        <div class="col-md-4 mb-4">
            <div class="card shadow border-danger h-100">
                <div class="card-body text-center">

                    <i class="fa fa-dollar-sign fa-3x text-danger mb-3"></i>

                    <h5>Revenue Report</h5>

                    <p class="text-muted">
                        Expected revenue from leads.
                    </p>

                    <a href="{{ route('reports.revenue') }}"
                        class="btn btn-danger">
                        Open Report
                    </a>

                </div>
            </div>
        </div>

    </div>

</div>

@endsection
