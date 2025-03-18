<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserAndColoumGameEventFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('game_event_followers', function (Blueprint $table) {
            $table->integer('user_id')->nullable();
            $table->renameColumn('game_id', 'game_event_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('game_event_followers', function (Blueprint $table) {
            $table->dropColumn('game_id');
            $table->renameColumn('game_event_id', 'game_id');
        });
    }
}
