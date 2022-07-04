<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_rate', function (Blueprint $table) {
            $table->string('id')->primary(); //primary key
            $table->string('id_member');//foreign key
            $table->string('id_product');//foreign key
            $table->integer('star')->default(5);
            $table->string('comment');
            $table->datetime('date_created');
            $table->integer('numb_like')->default(0);
            $table->string('status')->default('hienthi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_rate');
    }
}
