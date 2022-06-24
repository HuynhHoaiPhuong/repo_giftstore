<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user', function (Blueprint $table) {
            $table->increments('id')->primary(); //primary key
            $table->integer('id_role'); //foreign key
            $table->string('username')->unique();
            $table->string('password')->nullable(false);
            $table->string('user_token');
            $table->string('photo');
            $table->string('fullname');
            $table->integer('phone');
            $table->string('address');
            $table->string('gender');
            $table->date('birthday');
            $table->string('status');
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
        Schema::dropIfExists('tbl_user');
    }
}
