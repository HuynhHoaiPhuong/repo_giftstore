<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('id_user')->primary(); //primary key
            $table->string('id_role'); //foreign key
            $table->string('username')->unique();
            $table->string('password');
            $table->string('user_token')->unique();
            $table->string('photo')->nullable(true);
            $table->string('fullname');
            $table->string('phone');
            $table->string('address');
            $table->string('gender')->nullable(true);
            $table->date('birthday')->nullable(true);
            $table->string('status')->default('enabled');
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
