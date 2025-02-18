<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ActorFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        $lastInsertedId = DB::table("actors")->max("id");

        for ($i = $lastInsertedId; $i < $lastInsertedId+10; $i++) {
            DB::table("actors")->insert([
                "id" => $i + 1,
                "name" => $faker->name,
                "surname" => $faker->name,
                "birthdate" => $faker->date(),
                "country" => $faker->country(),
                "img_url" => $faker->imageUrl(),
                "created_at" => $faker->dateTimeBetween("-10 years","now"),
                "updated_at" => $faker->dateTimeBetween("-10 years","now"),
            ]);
        }
    }
}
