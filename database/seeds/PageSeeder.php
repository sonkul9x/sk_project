<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('sk_pages')->insert([
        	[
        		'title' => 'Abouts',     
        		'slug' => 'abouts',
        		'content' => 'contetn',
        		'image' => '',
        		'meta_description' => '',  
        		'meta_keywords' => '',
        		'status' => 1,
        		'user_id' => 1,
                'created_at' => new DateTime()   		
        	],
        	[
        		'title' => 'Contacts Us',     
        		'slug' => 'contacts-us',
        		'content' => 'contetn',
        		'image' => '',
        		'meta_description' => '',  
        		'meta_keywords' => '',
        		'status' => 1,
        		'user_id' => 1,
                'created_at' => new DateTime()   		
        	],
        	]);
    }
}
