<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('vacina_id');
            $table->integer('identificacao');
            $table->string('controle');
            $table->timestamps();
        });

         Schema::table('registros', function (Blueprint $table){
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
        Schema::dropIfExists('registros');
    }
}
