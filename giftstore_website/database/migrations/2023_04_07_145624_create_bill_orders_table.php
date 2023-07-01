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
            $table->string('id_provider');//foreign key
            $table->string('id_payment');//foreign key
            $table->string('id_user');//foreign key
            $table->string('id_warehouse');//foreign key
            $table->integer('total_quantity')->default(0);
            $table->bigInteger('total_price')->default(0);
            $table->datetime('date_order');
            $table->datetime('date_of_payment');
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
        Schema::dropIfExists('bill_orders');
    }
}
