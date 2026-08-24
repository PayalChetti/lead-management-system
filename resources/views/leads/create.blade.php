@extends('layouts.master')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h4>Create Lead</h4>
        </div>

        <div class="card-body">
            @if ($errors->any())

            <div class="alert alert-danger">

                <strong>Please fix the following errors:</strong>

                <ul class="mb-0 mt-2">

                    @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

            @endif
            <form action="{{ route('leads.store') }}" method="POST">

                @csrf

                @include('leads.form')

            </form>

        </div>

    </div>

</div>

@endsection
