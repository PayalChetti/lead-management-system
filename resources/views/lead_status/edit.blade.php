@extends('layouts.master')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">

            <h3>Edit Lead Status</h3>

        </div>

        <div class="card-body">

            <form action="{{ route('lead-status.update',$leadStatus->id) }}"
                method="POST">

                @csrf

                @method('PUT')

                @include('lead_status.form')

                <button class="btn btn-success">

                    Update

                </button>

                <a href="{{ route('lead-status.index') }}"
                    class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

</div>

@endsection
