<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->string('id_rate')->primary(); //primary key
            $table->string('id_member');//foreign key
            $table->string('id_product');//foreign key
            $table->integer('number_of_stars')->default(5);
            $table->string('comment');
            $table->integer('like')->default(0);
            $table->string('status')->default('enabled');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rates');
    }
}
