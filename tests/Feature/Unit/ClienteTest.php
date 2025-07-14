<?php

namespace Tests\Unit;

use App\Models\Cliente;
use App\Models\Cidade;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClienteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_client_can_be_created()
    {
        $cidade = Cidade::factory()->create();
        $cliente = Cliente::create([
            'cpf' => '12345678900',
            'nome' => 'Maria Souza',
            'data_nascimento' => '1990-01-01',
            'sexo' => 'F',
            'endereco' => 'Rua Exemplo, 100',
            'cidade_id' => $cidade->id,
        ]);

        $this->assertDatabaseHas('clientes', [
            'cpf' => '12345678900',
            'nome' => 'Maria Souza',
        ]);
        $this->assertInstanceOf(Cliente::class, $cliente);
    }

    /** @test */
    public function a_client_can_be_updated()
    {
        $cidade = Cidade::factory()->create();
        $cliente = Cliente::factory()->create(['cidade_id' => $cidade->id]);

        $cliente->update([
            'endereco' => 'Novo Endereço, 200',
        ]);

        $this->assertDatabaseHas('clientes', [
            'id' => $cliente->id,
            'endereco' => 'Novo Endereço, 200',
        ]);
    }

    /** @test */
    public function a_client_can_be_deleted()
    {
        $cidade = Cidade::factory()->create();
        $cliente = Cliente::factory()->create(['cidade_id' => $cidade->id]);

        $cliente->delete();

        $this->assertDatabaseMissing('clientes', [
            'id' => $cliente->id,
        ]);
    }

    /** @test */
    public function a_client_belongs_to_a_city()
    {
        $cidade = Cidade::factory()->create();
        $cliente = Cliente::factory()->create(['cidade_id' => $cidade->id]);

        $this->assertInstanceOf(Cidade::class, $cliente->cidade);
        $this->assertEquals($cidade->id, $cliente->cidade->id);
    }
}