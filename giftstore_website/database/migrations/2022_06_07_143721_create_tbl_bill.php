<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bill', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_member');//khoangoai
            $table->datetime('date_order');
            $table->datetime('date_confirm');
            $table->string('code_voucher');
            $table->float('total_price');
            $table->integer('total_quantity');
            $table->string('payment');
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
        Schema::dropIfExists('tbl_bill');
    }
}
