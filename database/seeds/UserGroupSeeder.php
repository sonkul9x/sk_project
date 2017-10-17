<?php

use Illuminate\Database\Seeder;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sk_user_groups')->insert([
        	[
        		'name' => 'Administrator',     
        		'permistion_id' => '',
                'created_at' => new DateTime()   		
        	],
        	[
        		'name' => 'Editor',    
        		'permistion_id' => '',
                'created_at' => new DateTime()   	    		
        	],
        	[
        		'name' => 'Author',     
        		'permistion_id' => '',
                'created_at' => new DateTime()  	   		
        	]
        	]);
    }
}
