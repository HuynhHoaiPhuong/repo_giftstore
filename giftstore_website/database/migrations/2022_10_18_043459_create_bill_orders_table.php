<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_orders', function (Blueprint $table) {
            $table->string('id_bill_order')->primary(); //primary key
            $table->string('id_producer');//foreign key
            $table->string('id_user');//foreign key
            $table->string('id_stock');//foreign key
            $table->integer('quantity')->default(0);
            $table->bigInteger('total_price')->default(0);
            $table->string('status')->default('enabled');
            $table->datetime('date_order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_orders');
    }
}
