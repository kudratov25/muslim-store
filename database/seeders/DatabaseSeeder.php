<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            BlogSeeder::class,
            CommentSeeder::class,
            TagSeeder::class,
            Product_typeSeeder::class,
            Product_type_itemSeeder::class,
            AdminSeeder::class,
            ColorSeeder::class,
            RateSeeder::class,
            ProductSeeder::class

        ]);
    }
}
