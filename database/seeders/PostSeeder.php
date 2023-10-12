<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => '5級クリア',
            'body' => '○○ジムの5級の課題登れた！',
            'image_path' => NULL,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
