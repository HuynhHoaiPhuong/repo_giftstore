<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBillOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bill_order_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->float('price_order');
            $table->integer('id_product');//khoangoai
            $table->integer('quantity');
            $table->float('total_price');
            $table->integer('id_bill_order');//khoangoai
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
        Schema::dropIfExists('tbl_bill_order_detail');
    }
}
