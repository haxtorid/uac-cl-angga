<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SentBoxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sent_boxes')->insert([
            'email_id' => 1,
            'user_id' => 1,
        ]);

        DB::table('sent_boxes')->insert([
            'email_id' => 2,
            'user_id' => 1,
        ]);

        DB::table('sent_boxes')->insert([
            'email_id' => 3,
            'user_id' => 2,
        ]);
    }
}
