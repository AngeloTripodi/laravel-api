@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }} of: {{ Auth::user()->name }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ Auth::user()->name }} {{ __('Dashboard') }}</div>

                    <div class="card-body">
                        Welcome,
                        {{ Auth::user()->name }}.
                        <p>{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
