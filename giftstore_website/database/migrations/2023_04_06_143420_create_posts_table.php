<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->string('id_post')->primary(); //primary key
            $table->string('id_topic');
            $table->string('name')->unique();
            $table->string('photo')->nullable(true);
            $table->string('slug')->unique();
            $table->string('description');
            $table->mediumText('content');
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
        Schema::dropIfExists('posts');
    }
}
