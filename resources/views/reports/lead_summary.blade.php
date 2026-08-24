@extends('layouts.master')

@section('content')

<style>
    @media print {

        /* Hide everything */
        body * {
            visibility: hidden;
        }

        /* Show only print area */
        #printArea,
        #printArea * {
            visibility: visible;
        }

        /* Position table at top of printed page */
        #printArea {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            padding: 0;
            margin: 0;
        }

        /* Table */
        #printArea table {
            width: 100% !important;
            border-collapse: collapse !important;
        }

        #printArea th,
        #printArea td {
            border: 1px solid #000 !important;
            padding: 8px !important;
            color: #000 !important;
        }

        #printArea th {
            font-weight: bold;
            background: #eee !important;
        }

        /* Remove Bootstrap responsive wrapper effect */
        #printArea .table-responsive {
            overflow: visible !important;
        }

        /* Don't print pagination */
        #printArea .pagination,
        #printArea .mt-3 {
            display: none !important;
        }

        /* Remove links/buttons from print */
        a {
            text-decoration: none !important;
        }
    }
</style>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row mb-3">
        <div class="col-md-6">
            <h3>
                <i class="fa fa-chart-line text-primary"></i>
                Lead Summary Report
            </h3>
        </div>

        <div class="col-md-6 text-end">

            <a href="{{ route('leads.export.excel') }}" class="btn btn-success">
                <i class="fa fa-file-excel"></i> Export Excel
            </a>

            <a href="{{ route('leads.export.pdf') }}" class="btn btn-danger">
                <i class="fa fa-file-pdf"></i> Export PDF
            </a>

            <a onclick="printTable()" class="btn btn-dark">
                <i class="fa fa-print"></i> Print
            </a>

        </div>
    </div>

    <!-- Filter Card -->
    <div class="card shadow mb-4">

        <div class="card-header bg-primary text-white">
            <strong>Search Filters</strong>
        </div>

        <div class="card-body">

            <form method="GET" action="{{ route('reports.lead-summary') }}">

                <div class="row">

                    <div class="col-md-3 mb-3">
                        <label>From Date</label>

                        <input type="date"
                            name="from_date"
                            class="form-control"
                            value="{{ request('from_date') }}">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>To Date</label>

                        <input type="date"
                            name="to_date"
                            class="form-control"
                            value="{{ request('to_date') }}">
                    </div>

                    <div class="col-md-3 mb-3">

                        <label>Status</label>

                        <select name="status_id" class="form-select">

                            <option value="">All Status</option>

                            @foreach($statuses as $status)

                            <option value="{{ $status->id }}"
                                {{ request('status_id')==$status->id ? 'selected' : '' }}>

                                {{ $status->name }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-3 mb-3">

                        <label>Source</label>

                        <select name="source_id" class="form-select">

                            <option value="">All Sources</option>

                            @foreach($sources as $source)

                            <option value="{{ $source->id }}"
                                {{ request('source_id')==$source->id ? 'selected' : '' }}>

                                {{ $source->name }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-3 mb-3">

                        <label>Assigned User</label>

                        <select name="assigned_to" class="form-select">

                            <option value="">All Users</option>

                            @foreach($users as $user)

                            <option value="{{ $user->id }}"
                                {{ request('assigned_to')==$user->id ? 'selected' : '' }}>

                                {{ $user->name }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-9 d-flex align-items-end">

                        <button class="btn btn-primary me-2">

                            <i class="fa fa-search"></i>
                            Search

                        </button>

                        <a href="{{ route('reports.lead-summary') }}"
                            class="btn btn-secondary">

                            <i class="fa fa-refresh"></i>
                            Reset

                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <!-- Report Table -->

    <!-- Report Table -->
    <div class="card shadow">

        <div class="card-header bg-light">
            <strong>Lead Summary</strong>
        </div>

        <div class="card-body" id="printArea">

            <div class="table-responsive">

                <table class="table table-bordered table-striped">

                    <thead class="table-dark">

                        <tr>
                            <th>#</th>
                            <th>Lead No</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Source</th>
                            <th>Assigned To</th>
                            <th>Expected Value</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($leads as $lead)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $lead->lead_no }}</td>

                            <td>{{ $lead->name }}</td>

                            <td>{{ $lead->company ?? '-' }}</td>

                            <td>{{ $lead->phone }}</td>

                            <td>
                                {{ $lead->leadStatus->name ?? '-' }}
                            </td>

                            <td>
                                {{ $lead->leadSource->name ?? '-' }}
                            </td>

                            <td>
                                {{ $lead->assignedUser->name ?? '-' }}
                            </td>

                            <td>
                                ₹ {{ number_format($lead->expected_value ?? 0, 2) }}
                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="9" class="text-center">
                                No Records Found
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <!-- Pagination should NOT print -->
            <div class="mt-3 no-print">
                {{ $leads->links() }}
            </div>

        </div>

    </div>

</div>

<script>
    function printTable() {
        window.print();
    }
</script>

@endsection