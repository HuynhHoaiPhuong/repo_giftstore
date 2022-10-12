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
            $table->string('username')->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('user_token')->unique()->nullable(false);
            $table->string('photo')->nullable(false);
            $table->string('fullname')->nullable(false);
            $table->string('phone')->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('gender')->nullable(false);
            $table->date('birthday')->nullable(false);
            $table->string('status')->nullable(false)->default('enabled');
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
