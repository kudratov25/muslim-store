<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::factory(20)->create();
        
        // Blog::create([
        //     'user_id'=>1,
        //     'image' => null,
        //     'title' => 'Samsung',
        //     'short_text' => 'Zamonaviy telefondan foydalaning',
        //     'content' => 'parametrs/12GB/256GB',
        //     'text_headline' => '12GB tezkor xotira maksimal tezlik',
        // ]);
    }
}
