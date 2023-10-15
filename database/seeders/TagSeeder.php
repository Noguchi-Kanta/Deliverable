<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;


class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
                'name' => '初心者',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('tags')->insert([
                'name' => '仲間募集',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('tags')->insert([
                'name' => 'ジム紹介',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('tags')->insert([
                'name' => '課題作成',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);    
        DB::table('tags')->insert([
                'name' => '今日の成果',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);    
    }
}
