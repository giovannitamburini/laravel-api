<?php

namespace Database\Seeders;

// technology model
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Faker
use Faker\Generator as Faker;
//devo fare l'import del dell'helper e in questo caso specifico per le stringhe
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $technologies = ['HTML', 'CSS', 'Figma', 'JavaScript', 'Postman', 'MySQL', 'PHP', 'Sass', 'VS Code'];

        foreach ($technologies as $technology) {

            $newTechnolgy = new Technology();

            $newTechnolgy->name = $technology;
            // uso il metodo slug per convertire il name in slug
            $newTechnolgy->slug = Str::slug($newTechnolgy->name, '-');
            // uso il faker per generare i colori casualmente
            $newTechnolgy->color = $faker->hexColor();

            $newTechnolgy->save();
        }
    }
}
