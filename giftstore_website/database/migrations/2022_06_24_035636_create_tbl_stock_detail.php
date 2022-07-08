<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblStockDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_stock_detail', function (Blueprint $table) {
            $table->string('id')->primary(); //primary key
            $table->string('id_stock');//foreign key
            $table->string('id_product');//foreign key
            $table->integer('quantity')->default(0);
            $table->float('price_pay')->default(0);
            $table->bigInteger('total_price')->default(0);
            $table->string('status')->default('hienthi');
            $table->datetime('date_created')->nullable(false);;
            $table->datetime('date_updated')->nullable(false);;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_stock_detail');
    }
}
