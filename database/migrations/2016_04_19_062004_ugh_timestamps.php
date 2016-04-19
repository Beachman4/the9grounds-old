<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UghTimestamps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tournament_groups_matches', function(Blueprint $table) {
            $table->timestamps();
        });
        Schema::table('teams_members', function(Blueprint $table) {
            $table->timestamps();
        });
        Schema::table('clans_members', function(Blueprint $table) {
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
