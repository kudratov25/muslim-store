<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
// fake user yaratadi

        User::create([
            'name' => 'John',
            'email' => 'john@mail.ru',
            'password' => Hash::make('password'),
            'photo' => 'avatar.jpg',
            'email_verified_at' => null,
        ]);
    }
}
