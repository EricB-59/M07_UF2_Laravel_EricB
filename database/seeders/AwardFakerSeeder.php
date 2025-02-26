<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AwardFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $lastInsertedId = DB::table("awards_actors")->max("id");

        for ($i = $lastInsertedId; $i < $lastInsertedId + 10; $i++) {
            DB::table("awards_actors")->insert([
                "id" => $i + 1,
                "name" => $faker->name,
            ]);
        }
    }
}
