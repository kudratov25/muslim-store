<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Laptops'],
            ['name' => 'TV & Audio'],
            ['name' => 'Smartphones'],
            ['name' => 'Cameras'],
            ['name' => 'Headphones'],
        ];
        Category::insert($data);
    }
}
