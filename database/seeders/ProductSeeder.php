<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Product::create([
        'admin_id'=>1,
        'category_id'=>1,
        'color_id'=>1,
        'rate_id'=>1,
        // 'image',
        'name'=>'Samsung A52',
        'name_uz'=>'Samsung A52 uzbek tilida',
        'name_ru'=>'Samsung A52 rus tilida',
        'short_text'=> 'this phone so amazing',
        'short_text_uz'=> 'Bu telefon ajoyib',
        'short_text_ru'=> 'Этот телефонь очень ',
        'text'=>'this is full context',
        'text_uz'=>'maxsult toliq tavsifi',
        'text_ru'=>'rus tilida bu text',
        'quantity'=>5,
        'price'=>10,
        'size'=>'64/4GB'
      ]);
    }
}
