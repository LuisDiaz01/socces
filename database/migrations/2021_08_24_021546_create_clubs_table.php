<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->string('name');
            $table->longText('mision')->nullable();
            $table->longText('history')->nullable();
            
            $table->unsignedInteger('stadium_id')->nullable();
            $table->foreign('stadium_id')->references('id')
            ->on('stadia')
            ->onDelete('CASCADE');


            $table->unsignedInteger('network_id')->nullable();
            $table->foreign('network_id')->references('id')
            ->on('networks')
            ->onDelete('CASCADE');

            
            /*$table->unsignedInteger('executive_id')->nullable();
            $table->foreign('executive_id')->references('id')
            ->on('users')
            ->onDelete('CASCADE');*/

            $table->string('address');
            $table->string('rif')->unique();
            $table->string('email')->unique();
            $table->string('phone_number')->unique()->nullable();
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
        Schema::dropIfExists('clubs');
    }
}
