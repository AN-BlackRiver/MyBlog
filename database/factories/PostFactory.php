<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->text(30),
            'content' => fake()->text(150),
            'category_id' => Category::inRandomOrder()->first(),
            'preview_image' => fake()->imageUrl($width = 640, $height = 480),
            'main_image' => fake()->imageUrl($width = 640, $height = 480),
        ];
    }
}
