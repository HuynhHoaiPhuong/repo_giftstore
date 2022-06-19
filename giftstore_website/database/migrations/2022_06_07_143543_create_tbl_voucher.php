<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblVoucher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_voucher', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->integer('max_user');
            $table->float('max-price');
            $table->integer('percent_price');
            $table->string('description');
            $table->datetime('date_start');
            $table->datetime('date_end');
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
        Schema::dropIfExists('tbl_voucher');
    }
}
