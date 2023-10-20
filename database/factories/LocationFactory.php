<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'street' => $this->faker->word(),
            'number' => $this->faker->numberBetween(0, 999),
            'city' => $this->faker->city(),
            'zip' => $this->faker->numerify('#####'),
            'country' => $this->faker->country(),
        ];
    }
}
