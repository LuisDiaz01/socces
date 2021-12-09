<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('athlete_id')->nullable();
            $table->foreign('athlete_id')->references('id')
            ->on('athletes')
            ->onDelete('CASCADE');

            $table->unsignedInteger('division_id')->nullable();
            $table->foreign('division_id')->references('id')
            ->on('divisions')
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
        Schema::dropIfExists('templates');
    }
}
