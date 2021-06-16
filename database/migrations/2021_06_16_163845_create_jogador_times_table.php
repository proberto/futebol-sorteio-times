<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJogadorTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogador_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_time');
            $table->unsignedBigInteger('id_jogador');
            $table->unsignedBigInteger('id_jogo');
            $table->timestamps();

            $table->foreign('id_time')->references('id')->on('times');
            $table->foreign('id_jogador')->references('id')->on('jogadors');
            $table->foreign('id_jogo')->references('id')->on('jogos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jogador_times');
    }
}
