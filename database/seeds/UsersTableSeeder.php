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
         DB::table('sk_users')->insert([
       		[
       		'username' => 'admin',
            'fullname' => str_random(15),
            'email' => str_random(10).'@gmail.com',
            'phone' => '0988258392',
            'password' => bcrypt('123456'),
            'group_id' => 1,
            'created_at' => new DateTime(),
        	],
        	[
       		'username' => 'admin2',
            'fullname' => str_random(15),
            'email' => str_random(10).'@gmail.com',
            'phone' => '0988258392',
            'password' => bcrypt('123456'),
            'group_id' => 1,
            'created_at' => new DateTime(),
        	],
        	[
       		'username' => 'member',
            'fullname' => str_random(15),
            'email' => str_random(10).'@gmail.com',
            'phone' => '0988258392',
            'password' => bcrypt('123456'),
            'group_id' => 1,
            'created_at' => new DateTime(),
        	],
        	[
       		'username' => 'users',
            'fullname' => str_random(15),
            'email' => str_random(10).'@gmail.com',
            'phone' => '0988258392',
            'password' => bcrypt('123456'),
            'group_id' => 1,
            'created_at' => new DateTime(),
        	]]
        );
    }
}
