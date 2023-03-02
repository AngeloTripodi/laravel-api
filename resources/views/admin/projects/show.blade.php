@extends('layouts.admin')
@section('entry')
    @vite(['resources/js/popupDeleter.js'])
@endsection

@section('content')
    <div class="container">

        <div class="card mt-5">
            <div class="card-header">
                Project date: {{ $project->project_date }}
                <div>Type: {{ $project->type->name }}</div>
            </div>
            <div class="card-body bg-black text-light">
                <h2 class="card-author">{{ $project->author }}</h2>
                <h5 class="card-title">{{ $project->title }}</h5>
                <div>
                    @foreach ($project->technologies as $technology)
                        #{{ $technology->name }}
                    @endforeach
                </div>
                @if (str_starts_with($project->image, 'http'))
                    <img class=" img-fluid" src="{{ $project->image }}" alt="{{ $project->title }}">
                @else
                    <img class=" img-fluid" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                @endif
                <p class="card-text"> {{ $project->content }}</p>
                <p></p>
                <h6 class=" text-uppercase mb-4">{{ $project->languages_used }}</h6>
                <a class="btn btn-sm btn-light" href="{{ route('admin.projects.edit', $project->id) }}">Edit</a>
                <form class="d-inline-block popupDel" data-element-name="{{ $project->title }}"
                    action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </div>
        </div>

    </div>
@endsection
