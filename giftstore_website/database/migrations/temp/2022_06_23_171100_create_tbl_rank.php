<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_rank', function (Blueprint $table) {
            $table->string('id')->primary(); //primary key
            $table->string('name');
            $table->integer('point')->default(0);
            $table->datetime('date_created');
            $table->datetime('date_updated');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_rank');
    }
}
