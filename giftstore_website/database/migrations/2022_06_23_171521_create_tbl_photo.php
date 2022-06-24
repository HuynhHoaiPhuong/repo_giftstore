<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPhoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_photo', function (Blueprint $table) {
            $table->increments('id')->primary(); //primary key
            $table->integer('numb')->default(0); 
            $table->string('name');
            $table->string('photo');
            $table->string('link');
            $table->string('type');
            $table->string('act');
            $table->datetime('date_created');
            $table->datetime('date_updated');
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
        Schema::dropIfExists('tbl_photo');
    }
}
