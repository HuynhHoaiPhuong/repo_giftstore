<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stock_details', function (Blueprint $table) {
            $table->string('id_stock_detail')->primary(); //primary key
            $table->string('id_stock'); //foreign key
            $table->string('id_product'); //foreign key
            $table->integer('quantity')->default(0);
            $table->float('price_pay')->default(0);
            $table->bigInteger('total_price')->default(0);
            $table->string('status')->default('enabled');
            $table->datetime('date_created')->nullable(false);
            $table->datetime('date_updated')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stock_details', function (Blueprint $table) {
            //
        });
    }
}