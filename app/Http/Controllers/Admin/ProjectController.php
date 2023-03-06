<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('project_date', 'DESC')->paginate(20);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create', ["project" => new Project(), 'types' => Type::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'unique:projects'],
            'languages_used' => 'required',
            'project_date' => 'required',
            'content' => 'required',
            'image' => 'required|image',
            'type_id' => 'required|exists:types,id'
        ]);
        $data['author'] = Auth::user()->name;
        $data['slug'] = Str::slug($data['title']);
        $data['image'] = Storage::put('uploads', $data['image']);
        $newProject = new Project();
        $newProject->fill($data);
        $newProject->save();

        return redirect()->route('admin.projects.index')->with('message', "Project '$newProject->title' has been created")->with('message_class', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $previusProject = Project::where('project_date', '>', $project->project_date)->orderBy('project_date')->first();
        $nextProject = Project::where('project_date', '<', $project->project_date)->orderBy('project_date', 'DESC')->first();


        return view('admin.projects.show', compact('project', 'nextProject', 'previusProject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', ['project' => $project, 'types' => Type::all(), 'technologies' => Technology::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => ['required', Rule::unique('projects')->ignore($project->id)],
            'languages_used' => 'required',
            'project_date' => 'required',
            'content' => 'required',
            'image' => 'required|image',
            'type_id' => 'required|exists:types,id'
        ]);

        if ($request->hasFile('image')) {
            if ($project->isImageUrl()) {
                Storage::delete($project->image);
            }
            $data['image'] = Storage::put('uploads', $data['image']);
        }

        $project->update($data);
        return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->isImageUrl()) {
            Storage::delete($project->image);
        }

        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "The project '$project->title' has been removed.")->with('message_class', 'danger');
    }
}
