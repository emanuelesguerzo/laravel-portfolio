<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = include database_path('data/ProjectsData.php');

        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->title = $project["title"];
            $newProject->description = $project["description"];
            $newProject->cover_image = $project["cover_image"];
            $newProject->repo_url = $project["repo_url"];
            $newProject->website_url = $project["website_url"];
            $newProject->type_id = $project["type_id"];
            $newProject->save();

        }
    }
}
