<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBillDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bill_details', function (Blueprint $table) {
            $table->string('id')->primary(); //primary key
            $table->string('id_bill');//foreign key
            $table->string('id_product');//foreign key
            $table->integer('quantity')->default(0);
            $table->bigInteger('price')->default(0);
            $table->float('discount')->default(0);
            $table->string('rate_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_bill_details');
    }
}
