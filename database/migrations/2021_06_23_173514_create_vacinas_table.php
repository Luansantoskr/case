<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacinas', function (Blueprint $table) {
            $table->id();
            $table->string('fabricante');
            $table->string('lote');
            $table->string('validade');
            $table->integer('qtd');
            $table->string('intervalo');
            //$table->unsignedBigInteger('id_cliente');
            $table->timestamps();
        });

        // Schema::table('registro_clientes', function (Blueprint $table){
        //     $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacinas');
    }
}
