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
            $table->string('photo')->nullable(true);
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('description')->nullable(true);
            $table->string('content')->nullable(true);
            $table->string('type');
            $table->string('status')->default('enabled');
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
