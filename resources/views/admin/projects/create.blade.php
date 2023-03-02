@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('admin.partials.edit-create', [
            'method' => 'POST',
            'route' => 'admin.projects.store',
            'button' => 'Create project',
        ])
    </div>
@endsection
