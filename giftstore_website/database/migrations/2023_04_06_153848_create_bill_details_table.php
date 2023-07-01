<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_details', function (Blueprint $table) {
            $table->string('id_bill_detail')->primary(); //primary key
            $table->string('id_bill');//foreign key
            $table->string('id_product');//foreign key
            $table->string('id_discount')->nullable(true);//foreign key
            $table->integer('quantity')->default(0);
            $table->bigInteger('total_price')->default(0);
            $table->string('rate_status')->default('enabled');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_details');
    }
}
