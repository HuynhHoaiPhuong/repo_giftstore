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
            $table->increments('id')->primary(); //primary key
            $table->integer('id_producer');//foreign key
            $table->integer('id_user');//foreign key
            $table->integer('id_stock');//foreign key
            $table->datetime('date_order');
            $table->integer('quantity');
            $table->bigInteger('total_price');
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
        Schema::dropIfExists('tbl_bill_order');
    }
}
