<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cidade;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cidade::create(['nome' => 'Salvador', 'estado' => 'BA']);
        Cidade::create(['nome' => 'Lauro de Freitas', 'estado' => 'BA']);
        Cidade::create(['nome' => 'Camaçari', 'estado' => 'BA']);
        Cidade::create(['nome' => 'Simões Filho', 'estado' => 'BA']);
        Cidade::create(['nome' => 'Dias d\'Ávila', 'estado' => 'BA']);
        Cidade::create(['nome' => 'Mata de São João', 'estado' => 'BA']);
        Cidade::create(['nome' => 'Vera Cruz', 'estado' => 'BA']);
        Cidade::create(['nome' => 'Itaparica', 'estado' => 'BA']);
        Cidade::create(['nome' => 'São Francisco do Conde', 'estado' => 'BA']);
        Cidade::create(['nome' => 'Candeias', 'estado' => 'BA']);
        Cidade::create(['nome' => 'Madre de Deus', 'estado' => 'BA']);
        Cidade::create(['nome' => 'Pojuca', 'estado' => 'BA']);
        Cidade::create(['nome' => 'São Sebastião do Passé', 'estado' => 'BA']);
    }
}
