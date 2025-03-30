<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Actor;
use Illuminate\Support\Facades\App;
use App\Models\AwardsActor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actor>
 */
class ActorFactory extends Factory
{
    protected $model = Actor::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'surname' => $this->faker->year(),
            'birthdate' => $this->faker->date(),
            'country' => $this->faker->country(),
            'img_url' => $this->faker->imageUrl(),
            'awards_actors_id' => function () {
                return AwardsActor::factory()->create()->id;
            },
            'created_at' => $this->faker->dateTimeBetween('now', '+1 week'),
            'updated_at' => $this->faker->dateTimeBetween('now', '+1 week'),
        ];
    }
}
