@extends('layouts.admin')
@section('entry')
    @vite(['resources/js/popupDeleter.js'])
@endsection

@section('content')
    <div class="container">
        <div class="mt-4">
            {{ $projects->links() }}
        </div>

        @foreach ($projects as $project)
            <div class="card m-4">
                <div class="card-header">
                    Project date: {{ $project->project_date }}
                    <div>Type: {{ $project->type->name }}</div>
                </div>
                <div class="card-body bg-black text-light">
                    <h2 class="card-author">{{ $project->author }}</h2>
                    <h5 class="card-title">{{ $project->title }}</h5>
                    @if (str_starts_with($project->image, 'http'))
                        <img class=" img-fluid" src="{{ $project->image }}" alt="{{ $project->title }}">
                    @else
                        <img class=" img-fluid" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                    @endif
                    <p class="card-text"> {{ $project->content }}</p>
                    <h6 class=" text-uppercase mb-4">{{ $project->languages_used }}</h6>
                </div>
            </div>
        @endforeach


    </div>
@endsection
