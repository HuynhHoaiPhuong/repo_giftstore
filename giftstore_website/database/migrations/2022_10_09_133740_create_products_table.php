<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('id_product')->primary(); //primary key
            $table->string('id_product_list'); //foreign key
            $table->string('id_product_cat'); //foreign key
            $table->integer('numb')->default(0); 
            $table->string('code')->unique(); //mã sản phẩm
            $table->string('photo');
            $table->string('name')->unique();
            $table->string('slug')->unique()->nullable(false);
            $table->string('description');
            $table->bigInteger('price')->nullable(false);
            $table->string('status')->default("enabled");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
