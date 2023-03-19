<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_lists', function (Blueprint $table) {
            $table->string('id_product_list')->primary(); //primary key
            $table->integer('numb')->default(0); 
            $table->string('photo')->nullable(true);
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('description')->nullable(true);
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
        Schema::dropIfExists('product_lists');
    }
}
