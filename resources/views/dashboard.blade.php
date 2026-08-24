@extends('layouts.master')

@section('content')

<div class="row">

    <!-- Lead Status -->
    <div class="col-md-3 mb-4">
        <div class="card border-primary shadow-sm">
            <div class="card-body text-center">
                <h5>Lead Status Master</h5>
                <p class="text-muted">Manage Lead Status</p>

                <a href="{{ route('lead-status.index') }}" class="btn btn-primary">
                    Open
                </a>
            </div>
        </div>
    </div>

    <!-- Lead Source -->
    <div class="col-md-3 mb-4">
        <div class="card border-success shadow-sm">
            <div class="card-body text-center">
                <h5>Lead Source Master</h5>
                <p class="text-muted">Manage Lead Sources</p>

                <a href="{{ route('lead-source.index') }}" class="btn btn-success">
                    Open
                </a>
            </div>
        </div>
    </div>

    <!-- Lead Management -->
    <div class="col-md-3 mb-4">
        <div class="card border-info shadow-sm">
            <div class="card-body text-center">
                <h5>Lead Management</h5>
                <p class="text-muted">Manage Leads</p>

                <a href="{{ route('leads.index') }}" class="btn btn-info">
                    Open
                </a>
            </div>
        </div>
    </div>

    <!-- Follow-up -->
    <div class="col-md-3 mb-4">
        <div class="card border-warning shadow-sm">
            <div class="card-body text-center">
                <h5>Follow-up</h5>
                <p class="text-muted">Manage Follow-ups</p>

                <a href="{{ route('follow-ups.index') }}" class="btn btn-warning">
                    Open
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">

        <div class="card border-dark shadow">

            <div class="card-body text-center">

                <h5>Reports</h5>

                <p>View CRM Reports</p>

                <a href="{{ route('reports.index') }}"
                    class="btn btn-dark">

                    Open

                </a>

            </div>

        </div>

    </div>
</div>

<div class="row">


    <div class="col-md-4 mb-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5>Total Leads</h5>
                <h2>{{ $totalLeads }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card bg-info text-white">
            <div class="card-body">
                <h5>New Leads</h5>
                <h2>{{ $newLeads }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card bg-warning text-dark">
            <div class="card-body">
                <h5>Contacted</h5>
                <h2>{{ $contactedLeads }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card bg-secondary text-white">
            <div class="card-body">
                <h5>Qualified</h5>
                <h2>{{ $qualifiedLeads }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5>Won</h5>
                <h2>{{ $wonLeads }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card bg-danger text-white">
            <div class="card-body">
                <h5>Lost</h5>
                <h2>{{ $lostLeads }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card bg-dark text-white">
            <div class="card-body">
                <h5>Today's Follow-ups</h5>
                <h2>{{ $todayFollowups }}</h2>
            </div>
        </div>
    </div>

</div>

</div>

@endsection
