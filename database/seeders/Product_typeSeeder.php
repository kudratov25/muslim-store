<?php

namespace Database\Seeders;

use App\Models\Product_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Product_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product_type::create([
            'name_en' => 'Electronics',
            'name_uz' => 'Elekt mahsulotlari',
            'name_ru' => 'Електроника',
            'url'=>'electronics'
        ]);
        Product_type::create([
            'name_en' => 'Clothes',
            'name_uz' => 'Kiyimlar',
            'name_ru' => 'Одежды',
            'url'=>'clothes'
        ]);
    }
}
