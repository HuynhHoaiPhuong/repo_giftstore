<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_member', function (Blueprint $table) {
            $table->string('id')->primary(); //primary key
            $table->string('id_user'); //foreign key
            $table->string('id_rank'); //foreign key
            $table->integer('current_point')->default(0);
            $table->datetime('date_created')->nullable(false);
            $table->datetime('date_updated')->nullable(false);
            $table->string('status')->nullable(false)->default('hienthi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_member');
    }
}
