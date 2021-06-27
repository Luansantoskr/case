<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'idade',
        'cep',
        'endereco',
        'numero',
        'bairro',
        'comorbidade'
    ];

    public function vacina()
    {
        return $this->belongsTo(Vacina::class);
    }
}
