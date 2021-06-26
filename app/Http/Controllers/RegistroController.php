<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Vacina;
use App\Models\Cliente;
use App\Models\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\VacinaController;
use Symfony\Component\Console\Input\Input;
use App\Http\Controllers\ClienteController;

class RegistroController extends Controller
{
    public function __construct($id)
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = Registro::with('cliente')->get();
        return View::make('clientes.index', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $registro = new Registro();

        $registro->cliente     = Input::get('nome');
        $registro->vacina   = Input::get('fabricante');
        $registro->data     = Input::get('data');;

        $registro->save();

        return $registro;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
