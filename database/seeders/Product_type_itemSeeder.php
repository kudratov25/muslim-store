<?php

namespace Database\Seeders;

use App\Models\Product_type;
use App\Models\Product_type_item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Product_type_itemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product_type_item::factory(20)->create();      
    }
}
