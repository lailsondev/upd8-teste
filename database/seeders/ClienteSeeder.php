<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Cidade;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::truncate();

        $salvador = Cidade::where('nome', 'Salvador')->firstOrFail();
        $lauroDeFreitas = Cidade::where('nome', 'Lauro de Freitas')->firstOrFail();
        $camacari = Cidade::where('nome', 'Camaçari')->firstOrFail();
        $simoesFilho = Cidade::where('nome', 'Simões Filho')->firstOrFail();

        Cliente::create([
            'cpf' => '111.222.333-44',
            'nome' => 'João da Silva',
            'data_nascimento' => '1985-03-15',
            'sexo' => 'M',
            'endereco' => 'Rua do Comércio, 100',
            'cidade_id' => $salvador->id,
        ]);
        Cliente::create([
            'cpf' => '555.666.777-88',
            'nome' => 'Maria Oliveira',
            'data_nascimento' => '1992-07-20',
            'sexo' => 'F',
            'endereco' => 'Avenida Oceânica, 500',
            'cidade_id' => $salvador->id,
        ]);
        Cliente::create([
            'cpf' => '999.888.777-66',
            'nome' => 'Pedro Rocha',
            'data_nascimento' => '1978-11-05',
            'sexo' => 'M',
            'endereco' => 'Condomínio Sol Nascente, Bloco B',
            'cidade_id' => $lauroDeFreitas->id,
        ]);
        Cliente::create([
            'cpf' => '123.456.789-00',
            'nome' => 'Juliana Souza',
            'data_nascimento' => '1998-01-25',
            'sexo' => 'F',
            'endereco' => 'Rua das Flores, 30',
            'cidade_id' => $camacari->id,
        ]);
        Cliente::create([
            'cpf' => '000.111.222-33',
            'nome' => 'Rafaela Dantas',
            'data_nascimento' => '1980-09-10',
            'sexo' => 'F',
            'endereco' => 'Travessa da Paz, 70',
            'cidade_id' => $simoesFilho->id,
        ]);
    }
}
