<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBillDiscounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_discounts', function (Blueprint $table) {
            $table->string('id')->primary(); //primary key
            $table->string('id_rank');//foreign key
            $table->string('id_cat');//foreign key
            $table->float('percent_price')->default(0);
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
        Schema::dropIfExists('tbl_discounts');
    }
}
