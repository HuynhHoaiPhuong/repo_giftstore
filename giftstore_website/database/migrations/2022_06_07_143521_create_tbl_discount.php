<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDiscount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_discount', function (Blueprint $table) {
            $table->increments('id');
            $table->float('percent_price');
            $table->integer('id_rank');//khoangoai
            $table->integer('id_cat');//khoangoai
            $table->string('status');//khoangoai
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_discount');
    }
}
