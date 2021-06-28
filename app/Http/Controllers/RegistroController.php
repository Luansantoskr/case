<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;


class RegistroController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Registro::all();
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
            'data' => 'required',
            'identificacao' => 'required',
            'controle' => 'required',
        ]);
        $id = $request->cliente_id;
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
        return Registro::findOrFail($id);
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
        $registro=Registro::findOrFail($id);
        $registro->update($request->all());
        return $registro;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro = Registro::destroy($id);
        return "Registro " . $registro . " deletado com sucesso";
    }
}
