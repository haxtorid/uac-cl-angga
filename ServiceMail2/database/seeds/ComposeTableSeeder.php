<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ComposeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $composes = array();
        $compose = array(
            'user_id' => 1,
            'subject' => 'Hello world',
            'content' => 'This is content',
            'created_at' => Carbon::parse('2018-02-15 12:11:01')
        );
        array_push($composes, $compose);

        $compose = array(
            'user_id' => 2,
            'subject' => 'Hello world 2',
            'content' => 'This is content 2',
            'created_at' => Carbon::parse('2018-02-16 12:11:01')
        );
        array_push($composes, $compose);

        $compose = array(
            'user_id' => 3,
            'subject' => 'Hello world 3',
            'content' => 'This is content 3',
            'created_at' => Carbon::parse('2018-02-17 12:11:01')
        );
        array_push($composes, $compose);

        DB::table('compose')->insert($composes);
    }
}
