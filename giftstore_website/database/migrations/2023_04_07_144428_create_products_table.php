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
            $table->string('id_category'); //foreign key
            $table->string('id_provider'); //foreign key
            $table->integer('numerical_order')->default(0); 
            $table->string('name')->unique();
            $table->string('photo');
            $table->bigInteger('price')->nullable(false);
            $table->string('slug')->unique()->nullable(false);
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
