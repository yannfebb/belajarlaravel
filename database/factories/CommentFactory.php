<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'post_id' => 1,
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'comment' => $this->faker->sentence()
        ];
    }
}
