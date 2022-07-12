@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}


                    <h1 class="text text-primary">
                        <br>
                        Vaši podaci:</h1>
                        <br>

                       <p> {{ auth()->user()->name}} <br>
                        {{ auth()->user()->email}} <br>
                           Registrirani: {{ auth()->user()->created_at->format('d.m.Y.') }} </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
