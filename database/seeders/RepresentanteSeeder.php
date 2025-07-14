<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Representante;
use App\Models\Cidade;

class RepresentanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Representante::truncate();
        
        $salvador = Cidade::where('nome', 'Salvador')->firstOrFail();
        $lauroDeFreitas = Cidade::where('nome', 'Lauro de Freitas')->firstOrFail();
        $camacari = Cidade::where('nome', 'Camaçari')->firstOrFail();
        $simoesFilho = Cidade::where('nome', 'Simões Filho')->firstOrFail();

        Representante::create([
            'nome' => 'Carlos Santos',
            'email' => 'carlos.santos@example.com',
            'telefone' => '71987654321',
            'cidade_id' => $salvador->id,
        ]);
        Representante::create([
            'nome' => 'Ana Paula Costa',
            'email' => 'ana.paula@example.com',
            'telefone' => '71912345678',
            'cidade_id' => $salvador->id,
        ]);
        Representante::create([
            'nome' => 'Fernanda Lima',
            'email' => 'fernanda.lima@example.com',
            'telefone' => '71998765432',
            'cidade_id' => $lauroDeFreitas->id,
        ]);
        Representante::create([
            'nome' => 'Roberto Almeida',
            'email' => 'roberto.almeida@example.com',
            'telefone' => '71981234567',
            'cidade_id' => $camacari->id,
        ]);
        Representante::create([
            'nome' => 'Patrícia Gomes',
            'email' => 'patricia.gomes@example.com',
            'telefone' => '71992345678',
            'cidade_id' => $simoesFilho->id,
        ]);
    }
}
