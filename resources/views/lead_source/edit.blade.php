@extends('layouts.master')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header bg-warning">
            <h3>Edit Lead Source</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('lead-source.update',$leadSource->id) }}"
                method="POST">

                @csrf
                @method('PUT')

                @include('lead_source.form')

                <button class="btn btn-warning">
                    Update
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
