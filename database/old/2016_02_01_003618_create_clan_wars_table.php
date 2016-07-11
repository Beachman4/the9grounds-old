<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClanWarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clan_wars', function (Blueprint $table) {
            $table->integer('id');
            $table->string('clan_participants_ids');
            $table->timestamp('date');
            $table->boolean('stream');
            $table->string('stream_username');
            $table->softDeletes();
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
        Schema::drop('clan_wars');
    }
}
