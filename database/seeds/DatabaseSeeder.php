<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
    	// $this->call(UserGroupSeeder::class);
     //    $this->call(UsersTableSeeder::class);
     //    $this->call(UsersPermistionSeeder::class);
       // $this->call(PageSeeder::class);
          $this->call(CustomerSeeder::class);
    }
}
