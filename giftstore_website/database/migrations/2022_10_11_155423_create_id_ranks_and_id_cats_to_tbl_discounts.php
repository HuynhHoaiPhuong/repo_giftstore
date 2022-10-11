<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdRanksAndIdCatsToTblDiscounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_discounts', function (Blueprint $table) {
            $table->foreign('id_cats')->references('id')->on('tbl_product_cats')->onUpdate('cascade'); 
            $table->foreign('id_ranks')->references('id')->on('tbl_ranks')->onUpdate('cascade');     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_discounts', function (Blueprint $table) {
            //
        });
    }
}
