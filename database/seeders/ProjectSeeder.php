<?php

namespace Database\Seeders;

// iportazione Model
use App\Models\Project;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
//devo fare l'import del dell'helper e in questo caso specifico per le stringhe
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
        for ($i = 0; $i < 10; $i++) {


            $project = new Project();

            $project->title = $faker->sentence(3);
            $project->content = $faker->text(500);
            // uso il metodo slug (helper in laravel)
            $project->slug = Str::slug($project->title, '-');

            $project->save();
        }
    }
}
