<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Seeder
use Database\Seeders\ProjectSeeder;

// Models
//use App\Models\Type;
//use App\Models\Project;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            TypeSeeder::class,
            ProjectSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Roberto Larivera',
        //     'email' => 'roberto@email.it',
        //     'password' => 'password',
        // ]);
    }
}
