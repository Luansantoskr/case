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
        'data', 'cliente_id', 'vacina_id', 'identificacao', 'controle'
    ];

    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }

    public function vacina()
    {
        return $this->hasOne(Vacina::class);
    }

}
