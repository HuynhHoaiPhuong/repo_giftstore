<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBillOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bill_orders', function (Blueprint $table) {
            $table->string('id')->primary(); //primary key
            $table->string('id_producers');//foreign key
            $table->string('id_users');//foreign key
            $table->string('id_stocks');//foreign key
            $table->datetime('date_order');
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
        Schema::dropIfExists('tbl_bill_orders');
    }
}
