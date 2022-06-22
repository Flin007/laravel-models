<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGirlUserLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('girl_user_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('girl_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index('girl_id', 'gus_girl_idx');
            $table->index('user_id', 'gus_user_idx');

            $table->foreign('girl_id', 'gus_girl_fk')->on('girls')->references('id');
            $table->foreign('user_id', 'gus_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('girl_user_likes');
    }
}
