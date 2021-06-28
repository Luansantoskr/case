<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segunda extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'vacina_vacina',
        'data_segunda'
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
