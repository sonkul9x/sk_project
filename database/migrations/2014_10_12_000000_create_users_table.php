<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sk_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique('username');
            $table->string('fullname');
            $table->string('email');
            $table->string('phone');
            $table->string('password');
            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('sk_user_groups')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sk_users');
    }
}
