<?php

namespace Database\Seeders;

use App\Models\Rate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['star' => '1'],
            ['star' => '2'],
            ['star' => '3'],
            ['star' => '4'],
            ['star' => '5'],
        ];
        Rate::insert($data);
       
    }
}