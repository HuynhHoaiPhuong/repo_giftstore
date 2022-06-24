<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBillOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bill_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_producer');//khoangoai
            $table->integer('id_user');//khoangoai
            $table->integer('id_stock');//khoangoai
            $table->datetime('date_order');
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
        Schema::dropIfExists('tbl_bill_order');
    }
}