<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
    		'user_name' 	=> 'admin',
    		'email' 	=> 'admin@gmail.com',
    		'password' 	=> Hash::make('altplus'), // md5 password <=> Bcrypt 
    		'level'	=> '1'
    	]);

         DB::table('users')->insert([
    		'user_name' 	=> 'probet',
    		'email' 	=> 'probet@gmail.com',
    		'password' 	=> Hash::make('123456'), // md5 password <=> Bcrypt 
    		'level'	=> '2'
    	]);


    	DB::table('users')->insert([
    		'user_name' 	=> 'badbet',
    		'email' 	=> 'badbet@gmail.com',
    		'password' 	=> Hash::make('123456'), // md5 password <=> Bcrypt 
    		'level'	=> '2'
    	]);
    }
}
