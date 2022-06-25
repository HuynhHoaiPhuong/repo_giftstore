<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBillDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bill_detail', function (Blueprint $table) {
            $table->increments('id')->primary(); //primary key
            $table->integer('id_bill');//foreign key
            $table->integer('id_product');//foreign key
            $table->integer('quantity');
            $table->float('price');
            $table->float('discount');
            $table->string('rate_status');
            $table->timestamps();
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
