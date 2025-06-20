<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'title' => fake()->sentence(2),
            'author_id' => Author::factory(),
            'description' => fake()->paragraph(),
            'date_of_publication' => fake()->date(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
