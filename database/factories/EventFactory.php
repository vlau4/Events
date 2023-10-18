<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'tags' => 'laravel, api, backend',
            'category' => $this->faker->word(),
            'email' => $this->faker->email(),
            'website' => $this->faker->url(),
            'location' => $this->faker->city(),
            'description' => $this->faker->paragraph(5)
        ];
    }
}
