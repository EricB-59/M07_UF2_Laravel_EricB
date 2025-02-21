<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FilmActorFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $filmId = DB::table('films')->inRandomOrder()->value('id');

        $actorIds = DB::table('actors')->inRandomOrder()->limit(3)->pluck('id')->toArray();

        if (!$filmId || count($actorIds) < 3) {
            return;
        }

        foreach ($actorIds as $actorId) {
            DB::table('films_actors')->insert([
                'film_id' => $filmId,
                'actor_id' => $actorId,
                'created_at' => $faker->dateTimeBetween("-10 years", "now"),
                'updated_at' => $faker->dateTimeBetween("-10 years", "now"),
            ]);
        }
    }
}
