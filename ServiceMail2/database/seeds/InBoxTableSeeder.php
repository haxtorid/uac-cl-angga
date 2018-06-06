<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InBoxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inbox')->insert([
            'email_id' => 1,
            'user_id' => 2,
        ]);
        DB::table('inbox')->insert([
            'email_id' => 1,
            'user_id' => 3,
        ]);

        DB::table('inbox')->insert([
            'email_id' => 2,
            'user_id' => 2,
        ]);
        DB::table('inbox')->insert([
            'email_id' => 2,
            'user_id' => 3,
        ]);

        DB::table('inbox')->insert([
            'email_id' => 3,
            'user_id' => 1,
        ]);
    }
}
