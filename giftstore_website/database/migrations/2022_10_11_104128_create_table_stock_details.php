<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableStockDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_stock_details', function (Blueprint $table) {
            $table->string('id')->primary(); //primary key
            $table->string('id_stocks'); //foreign key
            $table->string('id_products'); //foreign key
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
        Schema::dropIfExists('tbl_stock_details');
    }
}
