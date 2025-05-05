<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Carbon\Carbon;

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
            $newProject->created_at = Carbon::now()->subDays($daysAgo);
            $newProject->updated_at = Carbon::now()->subDays($daysAgo);
            $newProject->save();

            $daysAgo--; 
        }
    }
}
