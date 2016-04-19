<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tournaments', function(Blueprint $table) {
            $table->removeColumn('num_rounds');
            $table->string('stage');
            $table->integer('stage_format')->nullable();
            $table->integer('group_num')->nullable();
            $table->integer('group_adv')->nullabel();
            $table->integer('format');
            $table->integer('limit');
            $table->renameColumn('type', 'join_type');
            $table->removeColumn('scheduled_date');
            $table->timestamp('registration_cut_off');
            $table->timestamp('start_time');
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
