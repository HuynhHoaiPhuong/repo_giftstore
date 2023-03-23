<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->string('id_bill')->primary(); //primary key
            $table->string('id_member');//foreign key
            $table->string('code_voucher');
            $table->bigInteger('total_price')->default(0);
            $table->integer('total_quantity')->default(0);
            $table->string('payment');
            $table->string('status')->default('enabled');
            $table->datetime('date_order');
            $table->datetime('date_confirm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
