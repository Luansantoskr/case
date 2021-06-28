<?php

namespace App\Http\Controllers;

use App\Models\Vacina;
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

        if( !$id ){
            return "Desculpe, você ainda não tomou a primeira dose da vacina";
        }else{

         $iden = $request->identificacao;

         if( $iden == 2){
             $cli = $request->cliente_id;
             $vacina = $request->vacina_id;
             $veriVacina = Registro::findOrFail($cli)->vacina_id;
             $cont = Registro::findOrFail($cli)->controle;
             $dataVacina = Registro::find($cli)->data;
             $dataAtual = Carbon::now();
             $retorno = Carbon::createFromFormat("!Y-m-d", $dataVacina)->addDays($cont);

              if( $dataAtual < $retorno){
                  return "Desculpe, mas você ainda não está habilitado para tomar a segunda dose. Você
                  deverá voltar na data ". $retorno . "para a segunda dose";
                    }elseif( $vacina != $veriVacina ){
                        return "A segunda dose da vacina deverá ser a mesma vacina aplicada na primeira dose.";
                            }elseif( $iden != 1 or 2) {
                                return "Desculpe, mas você já tomou todas as doses necessárias!";
                                }else{
                                    return Segunda::create($request->all());
                                }
                    }
                }
            }
        }
