<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\mod_books;

class seed_books extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        mod_books::truncate();
        $faker = \Faker\Factory::create();
        for($i=0; $i<10; $i++){
            mod_books::create([
                'title' => $faker->title,
                'author' => $faker->name,
                'isbn' => rand(9789992000000, 9789992999999),
                'description' => $faker->text,
                'picture' => $faker->image,
                'published' => $faker->date,
                'type' => $faker->randomElement(['Электрон','Хэвлэмэл','Электрон + Хэвлэмэл']),
                'file' => $faker->file,
                'quantity' => rand(1, 10),
                'price' => rand(1000, 10000),
                'pages' => rand(1, 300),
                'rating' => rand(1, 10)
            ]);
        }
    }
}
