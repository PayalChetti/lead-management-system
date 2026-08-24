@extends('layouts.master')

@section('content')

<div class="container">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card shadow">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">Follow-up Management</h4>

            <a href="{{ route('follow-ups.create') }}" class="btn btn-light">
                <i class="fa fa-plus"></i> Add Follow-up
            </a>

        </div>

        <div class="card-body">

            <!-- Search Form -->
            <form method="GET" action="{{ route('follow-ups.index') }}">

                <div class="row mb-3">

                    <div class="col-md-4">

                        <input type="text"
                            name="search"
                            class="form-control"
                            placeholder="Search Lead..."
                            value="{{ request('search') }}">

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-primary">
                            Search
                        </button>

                        <a href="{{ route('follow-ups.index') }}"
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

                            <th width="60">#</th>

                            <th>Lead</th>

                            <th>Follow-up Date</th>

                            <th>Status</th>

                            <th>Remarks</th>

                            <th width="170">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($followUps as $followUp)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $followUp->lead->name ?? '-' }}</td>

                            <td>
                                {{ \Carbon\Carbon::parse($followUp->followup_date)->format('d-m-Y') }}
                            </td>

                            <td>

                                @if($followUp->status=='Pending')

                                <span class="badge bg-warning text-dark">
                                    Pending
                                </span>

                                @elseif($followUp->status=='Completed')

                                <span class="badge bg-success">
                                    Completed
                                </span>

                                @else

                                <span class="badge bg-danger">
                                    Missed
                                </span>

                                @endif

                            </td>

                            <td>{{ $followUp->remarks }}</td>

                            <td>

                                <a href="{{ route('follow-ups.show',$followUp->id) }}"
                                    class="btn btn-info btn-sm">

                                    View

                                </a>

                                <a href="{{ route('follow-ups.edit',$followUp->id) }}"
                                    class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form action="{{ route('follow-ups.destroy',$followUp->id) }}"
                                    method="POST"
                                    style="display:inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this Follow-up?')">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6" class="text-center">

                                No Follow-ups Found.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                {{ $followUps->links() }}

            </div>

        </div>

    </div>

</div>

@endsection
