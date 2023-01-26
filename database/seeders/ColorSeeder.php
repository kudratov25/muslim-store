<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create([
            'name_en'=>'red',
            'name_uz'=>'qizil',
            'name_ru'=>'Красний'
        ]);
        Color::create([
            'name_en'=>'green',
            'name_uz'=>'yashil',
            'name_ru'=>'Зелений'
        ]);
    }
}
