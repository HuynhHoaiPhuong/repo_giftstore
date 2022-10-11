<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdBillsAndIdProductsToTblBillDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_bill_details', function (Blueprint $table) {
            $table->foreign('id_bills')->references('id')->on('tbl_bills')->onUpdate('cascade'); 
            $table->foreign('id_products')->references('id')->on('tbl_products')->onUpdate('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_bill_details', function (Blueprint $table) {
            //
        });
    }
}
