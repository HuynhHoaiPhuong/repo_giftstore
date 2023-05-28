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
            $table->string('id_voucher');//foreign key
            $table->string('id_payment');//foreign key
            $table->bigInteger('total_price')->default(0);
            $table->integer('total_quantity')->default(0);
            $table->datetime('order_date');
            $table->datetime('date_of_payment')->nullable(true);
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
        Schema::dropIfExists('bills');
    }
}
