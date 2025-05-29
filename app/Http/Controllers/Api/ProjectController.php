<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {

        // Prendo tutti i Progetti dal DB
        $projects = Project::with(['type', 'technologies'])->get();

        return response()->json(
            [
                "success" => true,
                "data" => $projects,
            ]
        );
    }

    public function show($slug) {
        $project = Project::where('slug', $slug)->with(['type', 'technologies'])->firstOrFail();

        return response()->json(
            [
                "success" => true,
                "data" => $project
            ]
        );
    }
}
