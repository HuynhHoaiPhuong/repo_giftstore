<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdProviderAndIdPaymentAndIdUserAndIdWarehouseToBillOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bill_orders', function (Blueprint $table) {
            $table->foreign('id_provider')->references('id_provider')->on('providers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_payment')->references('id_payment')->on('payments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_warehouse')->references('id_warehouse')->on('warehouses')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bill_orders', function (Blueprint $table) {
            //
        });
    }
}
