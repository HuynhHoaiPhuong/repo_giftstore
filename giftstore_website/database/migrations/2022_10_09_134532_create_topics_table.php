<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->string('id_topic')->primary(); //primary key
            $table->string('photo')->nullable(false);
            $table->string('name')->unique()->nullable(false);
            $table->string('slug')->unique()->nullable(false);
            $table->string('description')->nullable(false);
            $table->string('content')->nullable(false);
            $table->string('type')->nullable(false);
            $table->string('status')->nullable(false)->default('enabled');
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
        Schema::dropIfExists('topics');
    }
}
