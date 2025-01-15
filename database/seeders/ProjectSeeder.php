<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'title' => 'Portfolio Project 1',
            'description' => 'Description for project 1',
            'image' => 'project1.jpg',
        ]);
    
        Project::create([
            'title' => 'Portfolio Project 2',
            'description' => 'Description for project 2',
            'image' => 'project2.jpg',
        ]);
    }
}
