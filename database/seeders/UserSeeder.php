<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('users')->insert([
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'password' => Hash::make('password'),
                'bio' => 'Hello!',
                'image_path' => 'https://res.cloudinary.com/dac07avbf/image/upload/v1697370283/top_image_example_evni5p.jpg',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
          DB::table('users')->insert([
                'name' => 'user2',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
    }
}
