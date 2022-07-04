<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdCatAndIdRankToTblDiscount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_discount', function (Blueprint $table) {
            $table->foreign('id_cat')->references('id')->on('tbl_product_cat');
            $table->foreign('id_rank')->references('id')->on('tbl_rank');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_discount', function (Blueprint $table) {
            //
        });
    }
}
