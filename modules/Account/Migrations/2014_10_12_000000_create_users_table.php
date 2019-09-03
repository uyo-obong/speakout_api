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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullName', 120);
            $table->string('userEmail')->unique();
            $table->string('password');
            $table->string('contactNo');
            $table->string('address', 250);
            $table->string('state', 150);
            $table->string('country',150);
            $table->string('pincode');
            $table->string('userImage');
            $table->string('regDate');
            $table->string('updationDate');
            $table->integer('status');
        });
    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
