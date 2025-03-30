<?php

namespace Database\Seeders;

use App\Models\AwardsActor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AwardsFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AwardsActor::factory()->count(10)->create();
    }
}
