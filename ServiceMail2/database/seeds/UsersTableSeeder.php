<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Billgates',
            'email' => 'billgates@gmail.com',
            'password' => bcrypt('secret')
        ]);

        DB::table('users')->insert([
            'name' => 'Mark Zukerberg',
            'email' => 'mark@gmail.com',
            'password' => bcrypt('secret')
        ]);

        DB::table('users')->insert([
            'name' => 'Nadiem Makarim',
            'email' => 'nadiem@gmail.com',
            'password' => bcrypt('secret')
        ]);
    }
}
