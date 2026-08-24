@extends('layouts.master')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>Lead Source Master</h3>

        <a href="{{ route('lead-source.create') }}"
            class="btn btn-success">

            Add Source

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

                <th>Source Name</th>

                <th>Status</th>

                <th width="180">Action</th>

            </tr>

        </thead>

        <tbody>

            @forelse($sources as $source)

            <tr>

                <td>{{ $source->id }}</td>

                <td>{{ $source->name }}</td>

                <td>

                    @if($source->is_active)

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

                    <a href="{{ route('lead-source.edit',$source->id) }}"
                        class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <form action="{{ route('lead-source.destroy',$source->id) }}"
                        method="POST"
                        class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete this source?')">

                            Delete

                        </button>

                    </form>

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

    </table>

    {{ $sources->links() }}

</div>

@endsection
