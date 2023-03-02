@extends('layouts.admin')
@section('entry')
    @vite(['resources/js/popupDeleter.js'])
@endsection

@section('content')
    <div class="container">
        <div class="col-12 text-end">
            <a class="btn btn-sm btn-success mt-5 mb-2" href="{{ route('admin.projects.create') }}">Create new project</a>
        </div>

        @if (session('message'))
            <div class="alert alert-{{ session('message_class') }}">{{ session('message') }}</div>
        @endif
        <table class="table table-dark table-striped table-bordered table-hover mt-1">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Projects Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Languages used:</th>
                    <th scope="col">Type:</th>
                    {{-- <th scope="col">Project description:</th> --}}
                    <th scope="col">Project date:</th>
                    <th scope="col">Actions:</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->author }}</td>
                        <td>{{ $project->languages_used }}</td>
                        <td> {{ $project->type->name }}</td>
                        {{-- <td>{{ $project->content }}</td> --}}
                        <td>{{ $project->project_date }}</td>
                        <td>
                            <a class="btn btn-sm btn-light" href="{{ route('admin.projects.show', $project->id) }}">Show</a>
                            <a class="btn btn-sm btn-light"
                                href="{{ route('admin.projects.edit', $project->id) }}">Edit</a>
                            <form class="d-inline-block popupDel" data-element-name="{{ $project->title }}"
                                action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>

        {{ $projects->links() }}
    </div>
@endsection
