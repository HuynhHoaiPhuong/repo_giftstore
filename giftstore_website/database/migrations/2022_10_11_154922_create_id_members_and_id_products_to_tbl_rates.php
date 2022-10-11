<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdMembersAndIdProductsToTblRates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_rates', function (Blueprint $table) {
            $table->foreign('id_members')->references('id')->on('tbl_members')->onUpdate('cascade'); 
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
        Schema::table('tbl_rates', function (Blueprint $table) {
            //
        });
    }
}
