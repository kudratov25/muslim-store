<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>User::factory(),
            'category_id'=>rand(1,5),
            'image'=>fake()->word(),
            'title'=>fake()->sentence(3),
            'short_text'=>fake()->sentences($nb = 3, $asText =true),
            'content'=>fake()->paragraphs($nb = 3, $asText = true),
            'text_headline'=>fake()->sentences($nb = 3, $asText= true),
        ];
    }
}
