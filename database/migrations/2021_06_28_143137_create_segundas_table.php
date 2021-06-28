<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSegundasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('segunda', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('vacina_id');
            $table->date('data_segunda');
            $table->integer('identificacao');
            $table->timestamps();
        });

        Schema::table('segunda', function (Blueprint $table){
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('vacina_id')->references('id')->on('vacinas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('segundas');
    }
}
