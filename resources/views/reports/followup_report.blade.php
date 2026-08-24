@extends('layouts.master')

@section('content')

<div class="container-fluid">

    <!-- Heading -->
    <div class="row mb-3">

        <div class="col-md-6">
            <h3>
                <i class="fa fa-calendar-check text-warning"></i>
                Follow-up Report
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

    <!-- Filter Card -->

    <div class="card shadow mb-4">

        <div class="card-header bg-warning">
            <strong>Search Filters</strong>
        </div>

        <div class="card-body">

            <form method="GET" action="{{ route('reports.followup') }}">

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

                        <label>User</label>

                        <select name="user_id" class="form-select">

                            <option value="">All Users</option>

                            @foreach($users as $user)

                            <option value="{{ $user->id }}"
                                {{ request('user_id')==$user->id ? 'selected' : '' }}>

                                {{ $user->name }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-3">

                        <label>Status</label>

                        <select name="status" class="form-select">

                            <option value="">All</option>
                            <option value="Pending">Pending</option>
                            <option value="Completed">Completed</option>

                        </select>

                    </div>

                </div>

                <div class="mt-3">

                    <button class="btn btn-primary">

                        <i class="fa fa-search"></i>
                        Search

                    </button>

                    <a href="{{ route('reports.followup') }}"
                        class="btn btn-secondary">

                        Reset

                    </a>

                </div>

            </form>

        </div>

    </div>

    <!-- Report Table -->

    <div class="card shadow">

        <div class="card-header bg-light">

            <strong>Follow-up List</strong>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped">

                    <thead class="table-dark">

                        <tr>

                            <th>#</th>

                            <th>Lead</th>

                            <th>Follow-up Date</th>

                            <th>User</th>

                            <th>Remarks</th>

                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($followups as $followup)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $followup->lead->name ?? '-' }}</td>

                            <td>{{ date('d-m-Y',strtotime($followup->followup_date)) }}</td>

                            <td>{{ $followup->user->name ?? '-' }}</td>

                            <td>{{ $followup->remarks }}</td>

                            <td>

                                @if($followup->status=='Completed')

                                <span class="badge bg-success">
                                    Completed
                                </span>

                                @elseif($followup->followup_date < date('Y-m-d'))

                                    <span class="badge bg-danger">
                                    Overdue
                                    </span>

                                    @else

                                    <span class="badge bg-warning">
                                        Pending
                                    </span>

                                    @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6" class="text-center">

                                No Follow-ups Found

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                {{ $followups->links() }}

            </div>

        </div>

    </div>

</div>

@endsection
