<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdBillAndIdProductAndIdDiscountToBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bill_details', function (Blueprint $table) {
            $table->foreign('id_bill')->references('id_bill')->on('bills')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_product')->references('id_product')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_discount')->references('id_discount')->on('discounts')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bill_details', function (Blueprint $table) {
            //
        });
    }
}
