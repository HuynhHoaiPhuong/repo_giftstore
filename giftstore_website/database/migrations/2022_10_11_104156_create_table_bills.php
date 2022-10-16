<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bills', function (Blueprint $table) {
            $table->string('id')->primary(); //primary key
            $table->string('id_members');//foreign key
            $table->string('code_voucher');
            $table->bigInteger('total_price')->default(0);
            $table->integer('total_quantity')->default(0);
            $table->string('payment');
            $table->datetime('date_order')->nullable(false);
            $table->datetime('date_confirm')->nullable(false);
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
        Schema::dropIfExists('tbl_bills');
    }
}