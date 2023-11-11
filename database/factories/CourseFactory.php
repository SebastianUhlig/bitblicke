<?php

namespace Database\Factories;

use App\Enums\CourseStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => '',
            'title' => $this->faker->name,
            'description' => $this->faker->text,
            'status' => array_rand(CourseStatus::asArray()),
            'online' => $this->faker->boolean,
            'published_at' => $this->faker->boolean ? $this->faker->dateTimeBetween('-1 month', '+1 month') : null,
            'unpublished_at' => $this->faker->boolean ? $this->faker->dateTimeBetween('-1 month', '+1 month') : null,
        ];
    }
}
