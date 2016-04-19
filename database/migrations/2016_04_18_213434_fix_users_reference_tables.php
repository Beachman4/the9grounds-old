<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixUsersReferenceTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tournaments_participants', function(Blueprint $table) {
            $table->renameColumn('user_id', 'users_id');
        });
        Schema::table('teams_members', function(Blueprint $table) {
            $table->renameColumn('user_id', 'users_id');
        });
        /*
         * Not related to what we are originally fixing, but conversations needs a sender and to id field
         */
        Schema::table('conversations', function(Blueprint $table) {
            $table->integer('sender_id');
            $table->integer('to_id');
        });
        Schema::table('clans_members', function(Blueprint $table) {
            $table->renameColumn('user_id', 'users_id');
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
