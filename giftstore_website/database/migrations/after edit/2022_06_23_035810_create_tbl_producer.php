<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProducer extends Migration
{
    /**
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_producer', function (Blueprint $table) {
            $table->string('id')->primary(); //primary key
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_producer');
    }
}
