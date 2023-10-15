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
        /**DB::table('posts')->insert([
            'user_id' => ,
            'title' => '',
            'body' => '',
            'tag_id' => ,
            'image_path' => NULL,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);**/
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => '4級の課題クリア！',
            'body' => '〇〇ジムの4級の課題完登できました！',
            'tag_id' => 5,
            'image_path' => NULL,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => '一緒に行きませんか？',
            'body' => '〇月〇日の〇時頃に〇〇ジムに行きます！よかったらセッションしましょう！',
            'tag_id' => 2,
            'image_path' => NULL,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
         DB::table('posts')->insert([
            'user_id' => 2,
            'title' => '5級の課題を作りました！',
            'body' => '〇〇ジムにて5級課題を作りました！ぜひトライしに来てください！',
            'tag_id' => 4,
            'image_path' => "https://res.cloudinary.com/dac07avbf/image/upload/v1697345884/%E3%83%9C%E3%83%AB%E3%83%80%E3%83%AA%E3%83%B3%E3%82%B0_%E3%82%A4%E3%83%A9%E3%82%B9%E3%83%88_j90lmy.jpg",
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

    
        
    }
}
