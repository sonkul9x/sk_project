<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sk_customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname',100);
            $table->string('username',50);
            $table->string('password',100);
            $table->string('email',100);            
            $table->string('phone');
            $table->string('address');
            $table->integer('point');
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
        Schema::dropIfExists('sk_customer');
    }
}
