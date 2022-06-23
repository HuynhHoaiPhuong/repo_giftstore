<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBillOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bill_order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_product');//khoangoai
            $table->integer('id_bill_order');//khoangoai
            $table->float('price_order');
            $table->integer('quantity');
            $table->float('total_price');
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
        Schema::dropIfExists('tbl_bill_order_details');
    }
}
