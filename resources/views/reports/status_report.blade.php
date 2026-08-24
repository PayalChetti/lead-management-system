@extends('layouts.master')

@section('content')

<div class="container-fluid">

    <!-- Heading -->
    <div class="row mb-3">

        <div class="col-md-6">
            <h3>
                <i class="fa fa-chart-pie text-success"></i>
                Lead Status Report
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

    <!-- Report Card -->

    <div class="card shadow">

        <div class="card-header bg-success text-white">

            <strong>Status Wise Lead Summary</strong>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="table-dark">

                        <tr>

                            <th width="60">#</th>

                            <th>Status</th>

                            <th>Color</th>

                            <th class="text-center">Total Leads</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($statuses as $status)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $status->color }}</td>

                            <td>



                                {{ $status->color }}

                            </td>

                            <td class="text-center">

                                <span class="badge bg-primary">

                                    {{ $status->leads_count }}

                                </span>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4" class="text-center">

                                No Records Found

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                    <tfoot>

                        <tr class="table-secondary">

                            <th colspan="3" class="text-end">

                                Total Leads

                            </th>

                            <th class="text-center">

                                {{ $statuses->sum('leads_count') }}

                            </th>

                        </tr>

                    </tfoot>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection
