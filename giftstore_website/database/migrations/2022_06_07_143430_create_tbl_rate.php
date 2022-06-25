<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_rate', function (Blueprint $table) {
            $table->increments('id')->primary(); //primary key
            $table->integer('id_member');//foreign key
            $table->integer('id_product');//foreign key
            $table->integer('star');
            $table->string('comment');
            $table->datetime('date_create');
            $table->integer('numb_like');
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
        Schema::dropIfExists('tbl_rate');
    }
}
