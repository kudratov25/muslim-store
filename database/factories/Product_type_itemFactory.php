<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Product_type_itemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_type_id'=>rand(1,2),
            'name_en'=> fake()->word(),
            'name_uz'=> fake()->word(),
            'name_ru'=> fake()->word(),
        ];
    }
}
