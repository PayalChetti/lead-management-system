@extends('layouts.master')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">

            <h4 class="mb-0">Edit Follow-up</h4>

            <a href="{{ route('follow-ups.index') }}" class="btn btn-dark">
                Back
            </a>

        </div>

        <div class="card-body">

            @if ($errors->any())

            <div class="alert alert-danger">

                <strong>Please fix the following errors:</strong>

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

            @endif

            <form action="{{ route('follow-ups.update',$followUp->id) }}" method="POST">

                @csrf
                @method('PUT')

                @include('follow-ups.form')

            </form>

        </div>

    </div>

</div>

@endsection
