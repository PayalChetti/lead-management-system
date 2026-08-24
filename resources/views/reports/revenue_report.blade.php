@extends('layouts.master')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row mb-3">

        <div class="col-md-6">
            <h3>
                <i class="fa fa-money-bill-wave text-success"></i>
                Revenue Report
            </h3>
        </div>

        <div class="col-md-6 text-end">

            <a href="#" class="btn btn-success">
                <i class="fa fa-file-excel"></i> Export Excel
            </a>

            <a href="#" class="btn btn-danger">
                <i class="fa fa-file-pdf"></i> Export PDF
            </a>

            <button onclick="window.print()" class="btn btn-dark">
                <i class="fa fa-print"></i> Print
            </button>

        </div>

    </div>

    <!-- Filters -->

    <div class="card shadow mb-4">

        <div class="card-header bg-success text-white">

            Revenue Filters

        </div>

        <div class="card-body">

            <form method="GET"
                action="{{ route('reports.revenue') }}">

                <div class="row">

                    <div class="col-md-3">

                        <label>From Date</label>

                        <input type="date"
                            name="from_date"
                            class="form-control"
                            value="{{ request('from_date') }}">

                    </div>

                    <div class="col-md-3">

                        <label>To Date</label>

                        <input type="date"
                            name="to_date"
                            class="form-control"
                            value="{{ request('to_date') }}">

                    </div>

                    <div class="col-md-3">

                        <label>Status</label>

                        <select class="form-select"
                            name="status_id">

                            <option value="">All</option>

                            @foreach($statuses as $status)

                            <option value="{{ $status->id }}"
                                {{ request('status_id')==$status->id?'selected':'' }}>

                                {{ $status->name }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-3 d-flex align-items-end">

                        <button class="btn btn-primary me-2">

                            Search

                        </button>

                        <a href="{{ route('reports.revenue') }}"
                            class="btn btn-secondary">

                            Reset

                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <!-- Summary Cards -->

    <div class="row mb-4">

        <div class="col-md-4">

            <div class="card bg-primary text-white">

                <div class="card-body text-center">

                    <h5>Total Expected Revenue</h5>

                    <h2>

                        ₹ {{ number_format($totalRevenue,2) }}

                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card bg-success text-white">

                <div class="card-body text-center">

                    <h5>Won Revenue</h5>

                    <h2>

                        ₹ {{ number_format($wonRevenue,2) }}

                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card bg-danger text-white">

                <div class="card-body text-center">

                    <h5>Lost Revenue</h5>

                    <h2>

                        ₹ {{ number_format($lostRevenue,2) }}

                    </h2>

                </div>

            </div>

        </div>

    </div>

    <!-- Revenue Table -->

    <div class="card shadow">

        <div class="card-header bg-light">

            Revenue Details

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped">

                    <thead class="table-dark">

                        <tr>

                            <th>#</th>
                            <th>Lead No</th>
                            <th>Lead Name</th>
                            <th>Company</th>
                            <th>Status</th>
                            <th>Expected Value</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($leads as $lead)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $lead->lead_no }}</td>

                            <td>{{ $lead->name }}</td>

                            <td>{{ $lead->company }}</td>

                            <td>

                                {{ $lead->leadStatus->name ?? '-' }}

                            </td>

                            <td>

                                ₹ {{ number_format($lead->expected_value,2) }}

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6"
                                class="text-center">

                                No Revenue Found

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                {{ $leads->links() }}

            </div>

        </div>

    </div>

</div>

@endsection
