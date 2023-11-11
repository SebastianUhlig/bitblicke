<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $slug = $this->faker->unique()->slug;

        return [
            'meta_title' => str($slug)->headline()->value(),
            'meta_description' => $this->faker->text,
            'slug' => $slug,
            'header_nav_title' => str($slug)->headline()->value(),
            'h1' => str($slug)->headline()->value(),
            'subtitle' => $this->faker->realText(30),
            'online' => $this->faker->boolean,
        ];
    }
}
