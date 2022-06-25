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
        Schema::create('tbl_bill_order_detail', function (Blueprint $table) {
            $table->increments('id')->primary(); //primary key
            $table->integer('id_product');//foreign key
            $table->integer('id_bill_order');//foreign key
            $table->float('price_order');
            $table->integer('quantity');
            $table->float('total_price');
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
        Schema::dropIfExists('tbl_bill_order_detail');
    }
}
