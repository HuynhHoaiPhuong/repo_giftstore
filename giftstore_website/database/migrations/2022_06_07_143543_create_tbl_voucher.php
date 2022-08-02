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
            $table->string('id')->primary(); //primary key
            $table->string('code');
            $table->integer('max_user')->default(0);
            $table->float('max_price')->default(0);
            $table->integer('percent_price')->default(0);
            $table->string('description');
            $table->datetime('date_start')->nullable(false);
            $table->datetime('date_end')->nullable(false);
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
        Schema::dropIfExists('tbl_voucher');
    }
}
