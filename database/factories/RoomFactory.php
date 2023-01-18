<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->word,
            'comment' => fake()->text($maxNbChars = 15),
            'first_bench_team' => fake()->text($maxNbChars = 6),
            'third_bench_team' => fake()->text($maxNbChars = 6),
        ];
    }
}
