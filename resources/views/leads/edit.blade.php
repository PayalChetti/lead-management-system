@extends('layouts.master')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">

            <h4>Edit Lead</h4>

            <a href="{{ route('leads.index') }}" class="btn btn-dark">
                Back
            </a>

        </div>

        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('leads.update',$lead->id) }}" method="POST">

                @csrf
                @method('PUT')

                @include('leads.form')

            </form>

        </div>

    </div>

</div>

@endsection
