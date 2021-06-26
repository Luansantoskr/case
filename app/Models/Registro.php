<?php

namespace App\Models;

use App\Models\Vacina;
use App\Models\RegistroCliente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registro extends Model
{
    use HasFactory;

    protected $fillable = [
        'registro_clientes', 'id_cliente', 'id_vacina'
    ];

    public function registros()
    {
        return $this->belongsToMany(RegistroCliente::class, 'registro_clientes', 'id_cliente', 'id_vacina');
    }

}
