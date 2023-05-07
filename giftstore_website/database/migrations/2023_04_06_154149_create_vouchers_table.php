<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->string('id_voucher')->primary(); //primary key
            $table->string('name')->unique();
            $table->string('code')->unique();
            $table->integer('number_of_uses')->default(0);
            $table->float('percent_price')->default(0);
            $table->float('max_price')->default(0);
            $table->float('min_price')->default(0);
            $table->string('description')->nullable(true);
            $table->datetime('start_day');
            $table->datetime('expiration_date');
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
        Schema::dropIfExists('vouchers');
    }
}
