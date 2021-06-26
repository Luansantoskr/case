<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroCliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cliente',
        'id_vacina'
    ];

    public function registros()
    {
        return $this->belongsToMany(Registro::class, 'id_cliente', 'id_vacina');
    }
}
