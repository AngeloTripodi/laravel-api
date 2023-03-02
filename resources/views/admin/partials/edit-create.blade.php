<form class="mt-5" action="{{ route($route, $project) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)

    <div class="mb-3">
        <label for="title" class="form-label">Title:</label>
        <input type="text" class="form-control" id="title" placeholder="Insert project title" name="title"
            value="{{ old('title', $project->title) }}">
    </div>

    <div class="mb-3">
        <label for="languages_used" class="form-label">Languages Used:</label>
        <input type="text" class="form-control" id="languages_used" placeholder="Insert languages used in project"
            name="languages_used" value="{{ old('languages_used', $project->languages_used) }}">
    </div>

    <div class="mb-3">
        <label for="type_id" class="form-label">Project Type:</label>
        <select class="form-control" name="type_id" id="type_id ">
            @foreach ($types as $type)
                <option value="{{ $type->id }}"
                    {{ old('type_id', $project->type_id) == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="project_date" class="form-label">Project date:</label>
        <input type="datetime" class="form-control" id="project_date" placeholder="Es: 2023-01-29" name="project_date"
            value="{{ old('project_date', $project->project_date) }}">
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Insert project description</label>
        <textarea class="form-control" id="content" rows="15" name="content">{{ old('content', $project->content) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="project_date" class="form-label">Insert image:</label>
        <input type="file" class="form-control" id="image" placeholder="file.jpg" name="image"
            value="{{ old('image', $project->image) }}">
    </div>

    <button type="submit" class="btn btn-primary">{{ $button }}</button>

</form>
