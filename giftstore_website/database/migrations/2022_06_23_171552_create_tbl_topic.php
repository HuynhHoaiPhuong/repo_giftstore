<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTopic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_topic', function (Blueprint $table) {
            $table->increments('id')->primary(); //primary key
            $table->string('photo');
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->string('content');
            $table->string('type');
            $table->datetime('date_created');
            $table->datetime('date_updated');
            $table->string('status');
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
        Schema::dropIfExists('tbl_topic');
    }
}
