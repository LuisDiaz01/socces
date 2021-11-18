<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encounters', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('title');
            $table->dateTime('start');
            $table->dateTime('end');

            $table->unsignedInteger('club_home_id')->nullable();
            $table->foreign('club_home_id')->references('id')
            ->on('clubs')
            ->onDelete('CASCADE');

            $table->unsignedInteger('club_visitor_id')->nullable();
            $table->foreign('club_visitor_id')->references('id')
            ->on('clubs')
            ->onDelete('CASCADE');

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
        Schema::dropIfExists('encounters');
    }
}
