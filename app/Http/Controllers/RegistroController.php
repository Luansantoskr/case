<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Vacina;
use App\Models\Cliente;
use App\Models\Registro;
use App\Models\RegistroCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\VacinaController;
use Symfony\Component\Console\Input\Input;
use App\Http\Controllers\ClienteController;

class RegistroController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'identificacao' => 'required',
            'controle' => 'required',
        ]);
        $id = $request->cliente_id;
        // $cpf = Cliente::findOrFail($id)->cpf;

        $iden = $request->identificacao;


        if($iden == 1){
            return Registro::create($request->all());
            }elseif( $iden == 2){
                return "Confira a data e veja se já está habilitado para tomar a segunda dose.";
        }elseif( $iden != 1 or 2){
            return "Por favor, informe o número da identificação da dose válido. Sendo apenas 1 ou 2";
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
