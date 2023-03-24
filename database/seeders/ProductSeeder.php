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
      Product::factory(8)->create();
      Product::create([
        'admin_id'=>1,
        'product_type_items_id'=>rand(1,5),
        'image' => 'image.jpg',
        'name_en'=>'Samsung A52',
        'name_uz'=>'Samsung A52 uzbek tilida',
        'name_ru'=>'Samsung A52 rus tilida',
        'short_text_en'=> 'this phone so amazing',
        'short_text_uz'=> 'Bu telefon ajoyib',
        'short_text_ru'=> 'Этот телефонь очень ',
        'text_en'=>'this is full context',
        'text_uz'=>'maxsult toliq tavsifi',
        'text_ru'=>'rus tilida bu text',
        'quantity'=>5,
        'price'=>1250,
        'size'=>'64/4GB'
      ]);
      Product::create([
        'admin_id'=>1,
        'product_type_items_id'=>rand(1,5),
        'image'=>'image.jpg',
        'name_en'=>'Iphone XS Max',
        'name_uz'=>'Iphone XS Max uzbek tilida',
        'name_ru'=>'Iphone Xs Max rus tilida',
        'short_text_en'=> 'this phone so amazing',
        'short_text_uz'=> 'Bu telefon ajoyib',
        'short_text_ru'=> 'Этот телефонь очень ',
        'text_en'=>'this is full context',
        'text_uz'=>'maxsult toliq tavsifi',
        'text_ru'=>'rus tilida bu text',
        'quantity'=>5,
        'price'=>1100,
        'size'=>'64/4GB'
      ]);
    }
}
