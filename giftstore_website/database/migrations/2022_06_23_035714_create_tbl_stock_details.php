<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblStockDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_stock_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_stock');//Khoangoai
            $table->integer('id_product');//Khoangoai
            $table->integer('quantity');
            $table->float('price_pay');
            $table->integer('total_price');
            $table->string('status');
            $table->datetime('date_create');
            $table->datetime('date_update');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_stock_details');
    }
}
