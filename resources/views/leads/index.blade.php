@extends('layouts.master')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white d-flex justify-content-between">

            <h4>Lead Management</h4>

            <a href="{{ route('leads.create') }}" class="btn btn-light">
                <i class="fa fa-plus"></i> Add Lead
            </a>

        </div>

        <div class="card-body">

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <form method="GET" action="{{ route('leads.index') }}">

                <div class="row mb-3">

                    <div class="col-md-3">
                        <input type="text"
                            name="search"
                            class="form-control"
                            placeholder="Search Name / Phone"
                            value="{{ request('search') }}">
                    </div>

                    <div class="col-md-3">
                        <button class="btn btn-primary">
                            Search
                        </button>

                        <a href="{{ route('leads.index') }}"
                            class="btn btn-secondary">
                            Reset
                        </a>
                    </div>

                </div>

            </form>

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="table-dark">

                        <tr>

                            <th>#</th>

                            <th>Lead No</th>

                            <th>Name</th>

                            <th>Company</th>

                            <th>Phone</th>

                            <th>Source</th>

                            <th>Status</th>

                            <th>Assigned To</th>

                            <th width="170">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($leads as $lead)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $lead->lead_no }}</td>

                            <td>{{ $lead->name }}</td>

                            <td>{{ $lead->company }}</td>

                            <td>{{ $lead->phone }}</td>

                            <td>{{ $lead->leadSource->name ?? '-' }}</td>

                            <td>

                                @if($lead->leadStatus)

                                <span class="badge bg-{{ $lead->leadStatus->color }}">
                                    {{ $lead->leadStatus->name }}
                                </span>

                                @endif

                            </td>

                            <td>{{ $lead->assignedUser->name ?? '-' }}</td>

                            <td>

                                <a href="{{ route('leads.show',$lead->id) }}"
                                    class="btn btn-info btn-sm">

                                    View

                                </a>

                                <a href="{{ route('leads.edit',$lead->id) }}"
                                    class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form action="{{ route('leads.destroy',$lead->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this lead?')">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="9" class="text-center">

                                No Leads Found

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{ $leads->links() }}

        </div>

    </div>

</div>

@endsection
