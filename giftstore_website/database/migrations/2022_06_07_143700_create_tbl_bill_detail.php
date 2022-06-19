<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBillDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bill_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code');
            $table->integer('id_bill');//khoangoai
            $table->integer('id_product');//khoangoai
            $table->integer('quantity');
            $table->float('price');
            $table->float('discount');
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
        Schema::dropIfExists('tbl_bill_detail');
    }
}
