<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdMemberAndIdProductToTblFavorite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_favorite', function (Blueprint $table) {
            $table->foreign('id_member')->references('id')->on('tbl_member');
            $table->foreign('id_product')->references('id')->on('tbl_product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_favorite', function (Blueprint $table) {
            //
        });
    }
}
