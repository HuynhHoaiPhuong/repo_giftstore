<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdProducersAndIdUsersAndIdStocksToTblBillOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_bill_orders', function (Blueprint $table) {
            $table->foreign('id_producers')->references('id')->on('tbl_producers')->onUpdate('cascade'); 
            $table->foreign('id_users')->references('id')->on('tbl_users')->onUpdate('cascade'); 
            $table->foreign('id_stocks')->references('id')->on('tbl_stocks')->onUpdate('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_bill_orders', function (Blueprint $table) {
            //
        });
    }
}
