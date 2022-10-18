<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdProductAndIdBillOrderToBillOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bill_order_details', function (Blueprint $table) {
            $table->foreign('id_product')->references('id_product')->on('products'); 
            $table->foreign('id_bill_order')->references('id_bill_order')->on('bill_orders'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bill_order_details', function (Blueprint $table) {
            //
        });
    }
}
