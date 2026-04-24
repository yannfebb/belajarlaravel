<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

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
        'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
        'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
        'title' => $this->faker->sentence(),
        'slug' => $this->faker->slug(),
        'content' => $this->faker->paragraph(5),
        'featured_image' => null,
        'status' => 1 
        ];
    }
}
