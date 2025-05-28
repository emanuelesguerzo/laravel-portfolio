<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = include database_path("data/TechnologiesData.php");

        foreach($technologies as $technology) {
            $newTechnology = new Technology();
            $newTechnology->name = $technology["name"];
            $newTechnology->color = $technology["color"];
            $newTechnology->save();
        }
    }
}
