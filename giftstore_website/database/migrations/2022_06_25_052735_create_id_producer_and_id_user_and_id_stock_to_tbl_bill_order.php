<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdProducerAndIdUserAndIdStockToTblBillOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_bill_order', function (Blueprint $table) {
            $table->foreign('id_producer')->references('id')->on('tbl_producer');
            $table->foreign('id_user')->references('id')->on('tbl_user'); 
            $table->foreign('id_stock')->references('id')->on('tbl_stock'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_bill_order', function (Blueprint $table) {
            //
        });
    }
}
