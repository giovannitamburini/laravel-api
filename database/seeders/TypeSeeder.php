<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Faker
use Faker\Generator as Faker;
//devo fare l'import del dell'helper e in questo caso specifico per le stringhe
use Illuminate\Support\Str;

use function PHPSTORM_META\type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // creo un array di tipologie (di progetto)
        $types = ['Front End', 'Back End', 'Full Stack'];

        foreach ($types as $type) {

            // clicco il suggerimento per importare il modello
            $newType = new Type();

            $newType->name = $type;
            $newType->slug = Str::slug($newType->name, '-');
            $newType->description = $faker->text(200);

            $newType->save();
        }
    }
}
