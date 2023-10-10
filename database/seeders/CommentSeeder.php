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
        /**DB::table('posts')->insert([
                'body' => 'nice!',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id'=>1,
                'post_id'=>9,
        ]);**/
    }
}
