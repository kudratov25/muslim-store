<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'admin_id' => 1,
            'product_type_items_id' => rand(1,5),
            'color_id' => 1,
            'name_en' => fake()->word(),
            'name_uz' => fake()->word(),
            'name_ru' => fake()->word(),
            'short_text_en' => fake()->sentences($nb = 3, $asText = true),
            'short_text_uz' => fake()->sentences($nb = 3, $asText = true),
            'short_text_ru' => fake()->sentences($nb = 3, $asText = true),
            'text_en' => fake()->paragraphs($nb = 3, $asText = true),
            'text_uz' => fake()->paragraphs($nb = 3, $asText = true),
            'text_ru' => fake()->paragraphs($nb = 3, $asText = true),
            'image' => 'image.jpg',
            'quantity' => rand(10, 150),
            'price' => rand(150, 350),
            'size' => rand(64, 256)
        ];
    }
}
