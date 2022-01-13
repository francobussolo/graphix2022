@extends('layouts.app')

@section('content')
  <div class="py-4 container">
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
                    <br>
                    {{ Auth::user()->user_type }}
                    <br>
                    {{ Auth::user()->username }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
