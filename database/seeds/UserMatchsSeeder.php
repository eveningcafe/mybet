<?php

use Illuminate\Database\Seeder;

class UserMatchsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user_matchs')->insert([
    		'match_id' 	=> '1',
    		'user_id' 	=>'3',
    		'bet_result'	=> 'home',
    		'money' => '100'
    	]);
    }
}
