<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Segunda;
use App\Models\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SegundaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function segundaDose(Request $request)
    {
        $id = $request->cliente_id;
        $cpf = Cliente::findOrFail($id)->cpf;

        if( !$cpf ){
            return "Desculpe, você ainda não tomou a primeira dose da vacina";
        }else{

         $iden = $request->identificacao;

         if( $iden == 2){
             $vacina = $request->vacina_id;
             $cont = $request->controle;
             $id = $request->cliente_id;
             $dataVacina = Registro::findOrFail($id)->data;
             $dataAtual = Carbon::now();
             $retorno = Carbon::createFromFormat("!Y-m-d", $dataVacina)->addDays($cont);

              if( $dataAtual < $retorno){
                  return "Desculpe, mas você ainda não está habilitado para tomar a segunda dose. Você
                  deverá voltar na data ". $retorno . "para a segunda dose";
              }elseif( $vacina ){
                  return Segunda::create($request->all());
             }
         }elseif( $iden != 1 or 2) {
             return "Desculpe, mas você já tomou todas as doses necessárias!";
         }

        }
    }
}
