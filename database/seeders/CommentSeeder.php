<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        DB::table('comments')->insert([
                'body' => 'nice!',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id'=>2,
                'post_id'=>1,
        ]);
    }
}
