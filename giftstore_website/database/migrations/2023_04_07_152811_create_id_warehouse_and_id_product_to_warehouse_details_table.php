<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdWarehouseAndIdProductToWarehouseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('warehouse_details', function (Blueprint $table) {
            $table->foreign('id_warehouse')->references('id_warehouse')->on('warehouses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_product')->references('id_product')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('warehouse_details', function (Blueprint $table) {
            //
        });
    }
}
