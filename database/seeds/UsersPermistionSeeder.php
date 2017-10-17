<?php

use Illuminate\Database\Seeder;

class UsersPermistionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sk_user_permistions')->insert([
            [
                'name' => 'List News',
                'routes' => 'getNewList',
                'parent_id' => 0,
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Add News',
                'routes' => 'getNewAđd',
                'parent_id' => 1,
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Edit Post',
                'routes' => 'getNewEdit',
                'parent_id' => 1,
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Delete Post',
                'routes' => 'getNewDel',
                'parent_id' => 1,
                'created_at' => new DateTime()
            ],
            [
                'name' => 'List User',
                'routes' => 'getUserList',
                'parent_id' => 0,
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Add User',
                'routes' => 'getNewAdd',
                'parent_id' => 2,
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Edit User',
                'routes' => 'getUserEdit',
                'parent_id' => 2,
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Delete Post',
                'routes' => 'getUserDel',
                'parent_id' => 2,
                'created_at' => new DateTime()
            ],
        ]);
    }
}
