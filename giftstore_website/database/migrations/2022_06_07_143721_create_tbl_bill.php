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
            $table->increments('id')->primary(); //primary key
            $table->integer('id_member');//foreign key
            $table->string('code_voucher');
            $table->float('total_price');
            $table->integer('total_quantity');
            $table->string('payment');
            $table->datetime('date_order');
            $table->datetime('date_confirm');
            $table->string('status');
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
        Schema::dropIfExists('tbl_bill');
    }
}
