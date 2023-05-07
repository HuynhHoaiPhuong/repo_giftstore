<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdMemberToBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->foreign('id_member')->references('id_member')->on('members')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_voucher')->references('id_voucher')->on('vouchers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_payment')->references('id_payment')->on('payments')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bills', function (Blueprint $table) {
            //
        });
    }
}
