<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sk_customer')->insert([
        	[
        		'fullname' => 'Trần Văn Sơn',     
        		'username' => 'sontv.dev',
        		'password' => bcrypt('123456'),
        		'email' => 'tson171192@gmail.com',
        		'phone' => '0912345678',  
        		'address' => 'Minh Quang - Vũ Thư - Thái Bình',
        		'point' => 99999,        		
                'created_at' => new DateTime()   		
        	],
        	[
        		'fullname' => 'Sơn Trần',     
        		'username' => 'sontran.dev',
        		'password' => bcrypt('123456'),
        		'email' => 'sontran.dev@gmail.com',
        		'phone' => '0988258392',  
        		'address' => 'Ngã Tư Phố Nguận',
        		'point' => 1,        		
                'created_at' => new DateTime()   		
        	]
        	]);     
    }
}
