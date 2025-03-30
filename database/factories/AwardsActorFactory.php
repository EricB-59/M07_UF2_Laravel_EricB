<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AwardsActor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AwardsActor>
 */
class AwardsActorFactory extends Factory
{
    protected $model = AwardsActor::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'created_at' => $this->faker->dateTimeBetween('now', '+1 week'),
            'updated_at' => $this->faker->dateTimeBetween('now', '+1 week'),
        ];
    }
}
