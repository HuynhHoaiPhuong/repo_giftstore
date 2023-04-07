<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->string('id_category')->primary(); //primary key
            $table->string('id_type_category'); //foreign key
            $table->integer('numerical_order')->default(0); 
            $table->string('name')->unique();
            $table->string('photo')->nullable(true);            
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
        Schema::dropIfExists('categories');
    }
}
