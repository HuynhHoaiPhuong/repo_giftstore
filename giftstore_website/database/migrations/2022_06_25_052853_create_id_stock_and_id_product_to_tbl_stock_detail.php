<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdStockAndIdProductToTblStockDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_stock_detail', function (Blueprint $table) {
            $table->foreign('id_stock')->references('id')->on('tbl_stock'); 
            $table->foreign('id_product')->references('id')->on('tbl_product');
            $table->foreign('id_stock_detail')->references('id')->on('tbl_stock_detail'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_stock_detail', function (Blueprint $table) {
            //
        });
    }
}
