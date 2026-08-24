@extends('layouts.master')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header bg-success text-white">
            <h3>Create Lead Source</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('lead-source.store') }}" method="POST">

                @csrf

                @include('lead_source.form')

                <button class="btn btn-success">
                    Save
                </button>

                <a href="{{ route('lead-source.index') }}"
                    class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

@endsection
