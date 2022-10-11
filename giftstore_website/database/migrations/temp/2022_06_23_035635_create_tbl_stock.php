<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_stock', function (Blueprint $table) {
            $table->string('id')->primary(); //primary key
            $table->string('name')->unique()->nullable(false);
            $table->string('address');
            $table->string('status')->default('hienthi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_stock');
    }
}
