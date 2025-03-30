<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    protected $model = Film::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'year' => $this->faker->year(),
            'genre' => $this->faker->name(),
            'country' => $this->faker->country(),
            'duration' => $this->faker->numberBetween(150, 240),
            'img_url' => $this->faker->imageUrl(),
            'created_at' => $this->faker->dateTimeBetween('now', '+1 week'),
            'updated_at' => $this->faker->dateTimeBetween('now', '+1 week'),
        ];
    }
}
