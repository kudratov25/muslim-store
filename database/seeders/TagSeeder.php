<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
        ['name'=>'gaming'],
        ['name'=>'chromebook'],
        ['name'=>'touchscreen'],
        ['name'=>'ultrabooks'],
        ['name'=>'soundcards'],
       ];
       Tag::insert($data);
    }
}
