@extends('layouts.master')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Lead Status Master</h3>

        <a href="{{ route('lead-status.create') }}" class="btn btn-primary">
            Add Status
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table table-bordered table-hover">

        <thead class="table-dark">

            <tr>

                <th>ID</th>

                <th>Status Name</th>

                <th>Color</th>

                <th>Status</th>

                <th width="180">Action</th>

            </tr>

        </thead>

        <tbody>

            @forelse($statuses as $status)

            <tr>

                <td>{{ $status->id }}</td>

                <td>{{ $status->name }}</td>

                <td>
                    <span class="badge bg-{{ $status->color }}">
                        {{ ucfirst($status->color) }}
                    </span>
                </td>

                <td>

                    @if($status->is_active)

                    <span class="badge bg-success">
                        Active
                    </span>

                    @else

                    <span class="badge bg-danger">
                        Inactive
                    </span>

                    @endif

                </td>

                <td>

                    <a href="{{ route('lead-status.edit',$status->id) }}"
                        class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('lead-status.destroy',$status->id) }}"
                        method="POST"
                        class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Delete this status?')"
                            class="btn btn-danger btn-sm">

                            Delete

                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="5" class="text-center">
                    No Records Found
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

    {{ $statuses->links() }}

</div>

@endsection
