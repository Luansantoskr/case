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

    public function vacinado()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function vacina()
    {
        return $this->belongsTo(Vacina::class);
    }
}
