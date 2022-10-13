<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bill_order_details', function (Blueprint $table) {
            $table->string('id_bill_order_detail')->primary(); //primary key
            $table->string('id_products');//foreign key
            $table->string('id_bill_orders');//foreign key
            $table->bigInteger('price_order')->default(0);
            $table->integer('quantity')->default(0);
            $table->bigInteger('total_price')->default(0);
            $table->string('status')->default('enabled');
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
