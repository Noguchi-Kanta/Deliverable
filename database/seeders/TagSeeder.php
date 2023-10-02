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
                'name' => 'a',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('tags')->insert([
                'name' => 'b',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('tags')->insert([
                'name' => 'c',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);    
    }
}
