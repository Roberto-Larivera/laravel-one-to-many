<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

// Helpers
use Faker\Generator as Faker;
use Illuminate\Support\Str;



class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i =0; $i  < 10; $i ++) { 
            // usando la sintassi 1
            /*
            $newProjectFake = new Project;
            $newProjectFake -> title = $faker->sentence(3);
            $newProjectFake -> slug = ?;
            $newProjectFake -> name_repo = $faker->?;
            $newProjectFake -> link_repo = $faker->?;
            $newProjectFake -> description = $faker->?;
            */
            // usando la sintassi 2
            $title = $faker->unique()->sentence(3);
            Project::create([
                'title' => $title,
                'slug' => str::slug($title),
                'name_repo' => str::slug($title),
                'link_repo' => $faker->url(),
                'description' => $faker->unique()->paragraph(),
            ]);
            
        }
    }
}
