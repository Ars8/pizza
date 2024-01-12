<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pizza>
 */
class PizzaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'price' => fake()->numberBetween(250, 950),
            'sizes' => json_encode(fake()->randomElements(['20', '30','40'], null)),
            'types' => json_encode(fake()->randomElements(['тонкое', 'традиционное'], null)),
            'imageUrl' => '/assets/avatars/avatar-'.rand(1,30).'.jpg',
        ];
    }
}