<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->string('id')->primary(); //primary key
            $table->string('id_list'); //foreign key
            $table->string('id_cat'); //foreign key
            $table->integer('numb')->default(0); 
            $table->string('code')->unique(); //mã sản phẩm
            $table->string('photo');
            $table->string('name');
            $table->string('slug')->unique()->nullable(false);
            $table->string('description');
            $table->bigInteger('price')->nullable(false);
            $table->datetime('date_created');
            $table->datetime('date_updated');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_product');
    }
}
