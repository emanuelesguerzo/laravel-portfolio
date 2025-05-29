<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        $types = Type::all();
        $technologies = Technology::all();
        return view("projects.index", compact("projects", "types", "technologies"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view("projects.create", compact("types", "technologies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newProject = new Project();
        $newProject->title = $data['title'];
        $newProject->slug = Str::slug($data['title']);
        $newProject->description = $data['description'];
        $newProject->repo_url = $data['repo_url'];
        $newProject->website_url = $data['website_url'];
        $newProject->type_id = $data['type_id'];

        if ($request->hasFile('cover_image')) {
            $img_url = Storage::disk('public')->put('projects', $data['cover_image']);
            $newProject->cover_image = $img_url;
        }

        $newProject->save();

        // Controllo se ricevo tecnologie
        if ($request->has("technologies")) {
            $newProject->technologies()->attach($data["technologies"]);
        }

        return redirect()->route("projects.show", $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view("projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view("projects.edit", compact("project", "types", "technologies"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();

        if ($project->title !== $data["title"]) {
            $project->slug = Str::slug($data["title"]);
        }

        $project->title = $data["title"];
        $project->description = $data["description"];
        $project->repo_url = $data["repo_url"];
        $project->website_url = $data["website_url"];
        $project->type_id = $data["type_id"];

        if ($request->hasFile('cover_image')) {
            // Se esiste un'immagine precedente, la elimino
            if ($project->cover_image && Storage::disk('public')->exists($project->cover_image)) {
                Storage::disk('public')->delete($project->cover_image);
            }

            // Carico la nuova immagine
            $img_url = Storage::disk('public')->put('projects', $data['cover_image']);
            $project->cover_image = $img_url;
        }

        $project->update();

        // Controllo se ci sono tecnologie
        if ($request->has("technologies")) {
            $project->technologies()->sync($data["technologies"]);
        } else {
            // Eliminiamo i dati del progetto attuale dalla tabella ponte
            $project->technologies()->detach();
        }

        return redirect()->route("projects.show", $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->technologies()->detach();

        if ($project->cover_image && Storage::disk('public')->exists($project->cover_image)) {
            Storage::disk('public')->delete($project->cover_image);
        }

        $project->delete();

        return redirect()->route("projects.index");
    }
}
