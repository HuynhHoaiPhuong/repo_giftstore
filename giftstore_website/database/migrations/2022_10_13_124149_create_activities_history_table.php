<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities_history', function (Blueprint $table) {
            $table->string('id_activity_history')->primary(); //primary key
            $table->string('id_user');//foreign key
            $table->string('activity');
            $table->string('type');
            $table->datetime('date_created')->nullable(false);
            $table->datetime('date_updated')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activities_history', function (Blueprint $table) {
            //
        });
    }
}
