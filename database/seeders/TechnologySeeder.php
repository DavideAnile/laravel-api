<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        $technologies = ['HTML', 'CSS', 'JS', 'PHP', 'LARAVEL', 'MySql', 'SASS' ];

        foreach($technologies as $technology){

            $newTechnology = new Technology();

            $newTechnology->name = $technology;
            $newTechnology->color = $faker->hexColor();
            $newTechnology->slug = Str::slug($newTechnology->name, '-');
        
            $newTechnology->save();
        }

    }
}
