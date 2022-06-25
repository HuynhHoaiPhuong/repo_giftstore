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
        Schema::create('tbl_stock_detail', function (Blueprint $table) {
            $table->increments('id')->primary(); //primary key
            $table->integer('id_stock');//foreign key
            $table->integer('id_product');//foreign key
            $table->integer('quantity');
            $table->float('price_pay');
            $table->integer('total_price');
            $table->string('status');
            $table->datetime('date_create');
            $table->datetime('date_update');
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
        Schema::dropIfExists('tbl_stock_detail');
    }
}
