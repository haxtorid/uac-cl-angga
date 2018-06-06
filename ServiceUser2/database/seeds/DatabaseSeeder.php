<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "name" => "Muhammad Angga",
            "email" => "angga@gmail.com",
            "password" => bcrypt("secret"),
            "level" => "0",
        ]);

        DB::table('users')->insert([
            "name" => "Mark Zukerberg",
            "email" => "mark@gmail.com",
            "password" => bcrypt("secret"),
            "level" => "0",
        ]);
    }
}
