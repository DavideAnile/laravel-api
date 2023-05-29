<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 8; $i++){
           $newProject = new Project();
           
           $newProject->project_name = $faker->sentence(3);
           $newProject->project_description = $faker->text(200);
           $newProject->github_link = $faker->url();
           $newProject->created_by = $faker->name();
           $newProject->slug = Str::slug($newProject->project_name, '-');

           $newProject->save();

        }
    }
}
