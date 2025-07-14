<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'estado',
    ];

    public function representantes()
    {
        return $this->hasMany(Representante::class);
    }

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
}
