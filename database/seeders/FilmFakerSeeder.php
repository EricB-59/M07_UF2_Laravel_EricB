<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FilmFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        $lastInsertedId = DB::table("films")->max("id");

        for ($i = $lastInsertedId; $i < $lastInsertedId+20; $i++) {
            DB::table("films")->insert([
                "id" => $i + 1,
                "name" => $faker->name,
                "year" => $faker->year,
                "genre" => $faker->randomElement([
                    "Drama",
                    "Comedy",
                    "Action",
                    "Fantasy"
                ]),
                "country" => $faker->country(),
                "duration" => $faker->randomNumber(3, true),
                "img_url" => $faker->imageUrl(),
                "created_at" => $faker->dateTimeBetween("-10 years","now"),
                "updated_at" => $faker->dateTimeBetween("-10 years","now"),
            ]);
        }
    }
}
