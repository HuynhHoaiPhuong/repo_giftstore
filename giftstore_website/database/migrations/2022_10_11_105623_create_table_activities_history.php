<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableActivitiesHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_activities_history', function (Blueprint $table) {
            $table->string('id')->primary(); //primary key
            $table->string('id_user');//foreign key
            $table->string('activity');
            $table->string('type');
            $table->datetime('date_created')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_activities_history');
    }
}
