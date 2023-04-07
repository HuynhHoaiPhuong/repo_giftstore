<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_categories', function (Blueprint $table) {
            $table->string('id_type_category')->primary(); //primary key
            $table->integer('numerical_order')->default(0); 
            $table->string('name')->unique();
            $table->string('slug')->unique();
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
        Schema::dropIfExists('type_categories');
    }
}
