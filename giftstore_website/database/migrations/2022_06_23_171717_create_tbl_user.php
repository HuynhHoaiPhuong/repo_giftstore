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
            $table->string('id')->primary(); //primary key
            $table->string('id_role'); //foreign key
            $table->string('username')->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('user_token')->unique();
            $table->string('photo')->nullable();
            $table->string('fullname')->nullable(false);
            $table->string('phone')->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('gender')->nullable(false);
            $table->date('birthday')->nullable(false);
            $table->string('status')->nullable(false)->default('hienthi');
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
