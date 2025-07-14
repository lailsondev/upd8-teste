<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'cpf',
        'nome',
        'data_nascimento',
        'sexo',
        'endereco',
        'cidade_id'
    ];

    protected $casts = [
        'data_nascimento' => 'date'
    ];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }
}
