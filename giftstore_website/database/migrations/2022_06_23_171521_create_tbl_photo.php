<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPhoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_photo', function (Blueprint $table) {
            $table->string('id')->primary(); //primary key
            $table->integer('numb')->default(0); 
            $table->string('name')->unique()->nullable(false);
            $table->string('photo')->nullable(false);
            $table->string('link')->nullable(false);
            $table->string('type')->nullable(false);
            $table->string('act')->nullable(false);
            $table->datetime('date_created')->nullable(false);
            $table->datetime('date_updated')->nullable(false);
            $table->string('status')->nullable(false)->default('hienthi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_photo');
    }
}
