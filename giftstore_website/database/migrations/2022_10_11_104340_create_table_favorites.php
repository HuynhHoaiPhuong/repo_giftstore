<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFavorites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_favorites', function (Blueprint $table) {
            $table->string('id')->primary(); //primary key
            $table->string('id_products');//foreign key
            $table->string('id_members');//foreign key
            $table->string('status')->default('enabled');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_favorites');
    }
}
