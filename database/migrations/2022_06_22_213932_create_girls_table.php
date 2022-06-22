<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGirlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('girls', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('bday');
            $table->string('city');
            $table->integer('number');
            $table->integer('breast_size')->nullable();
            $table->integer('height')->nullable();
            $table->string('hair_color')->nullable();
            $table->boolean('tattoos')->nullable();
            $table->boolean('silicon')->nullable();
            $table->integer('weight')->nullable();
            $table->string('eyes_color')->nullable();
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
        Schema::dropIfExists('girls');
    }
}
