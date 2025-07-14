<?php

namespace Tests\Feature;

use App\Models\Cliente;
use App\Models\Cidade;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClienteApiTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected Cidade $cidade;

    protected function setUp(): void
    {
        parent::setUp();
        $this->cidade = Cidade::factory()->create();
    }

    /** @test */
    public function it_can_list_all_clientes()
    {
        Cliente::factory()->count(3)->create(['cidade_id' => $this->cidade->id]);

        $response = $this->getJson('/api/clientes');

        $response->assertStatus(200)
                 ->assertJsonCount(3, 'data');
    }

    /** @test */
    public function it_can_create_a_cliente()
    {
        $clienteData = [
            'cpf' => $this->faker->unique()->numerify('###########'),
            'nome' => $this->faker->name,
            'data_nascimento' => $this->faker->date(),
            'sexo' => $this->faker->randomElement(['M', 'F']),
            'endereco' => $this->faker->address,
            'cidade_id' => $this->cidade->id,
        ];

        $response = $this->postJson('/api/clientes', $clienteData);

        $response->assertStatus(201)
                 ->assertJsonFragment(['nome' => $clienteData['nome']]);

        $this->assertDatabaseHas('clientes', [
            'cpf' => $clienteData['cpf'],
            'nome' => $clienteData['nome'],
        ]);
    }

    /** @test */
    public function it_returns_validation_errors_when_creating_a_cliente_with_invalid_data()
    {
        $response = $this->postJson('/api/clientes', [
            'nome' => '', // Nome vazio deve disparar 'required'
            'cpf' => 'invalid-cpf', // Este valor pode passar 'string|max:14'
            // Os campos 'data_nascimento', 'sexo', 'endereco', 'cidade_id' não são enviados,
            // e são 'required' no método store, então eles dispararão erros.
        ]);

        $response->assertStatus(422)
                 // A asserção deve incluir todos os campos que são 'required' no store e não foram enviados/são inválidos.
                 ->assertJsonValidationErrors(['nome', 'data_nascimento', 'sexo', 'endereco', 'cidade_id']);
    }

    /** @test */
    public function it_can_show_a_single_cliente()
    {
        $cliente = Cliente::factory()->create(['cidade_id' => $this->cidade->id]);

        $response = $this->getJson('/api/clientes/' . $cliente->id);

        $response->assertStatus(200)
                 ->assertJsonFragment(['nome' => $cliente->nome]);
    }

    /** @test */
    public function it_returns_404_if_cliente_not_found()
    {
        $response = $this->getJson('/api/clientes/999');

        $response->assertStatus(404)
                 ->assertJsonFragment(['message' => 'No query results for model [App\\Models\\Cliente] 999']);
    }

    /** @test */
    public function it_can_update_a_cliente()
    {
        $cliente = Cliente::factory()->create(['cidade_id' => $this->cidade->id]);
        $updatedNome = 'Nome Atualizado';
        
        // Enviamos todos os campos para garantir que a validação 'sometimes|required'
        // não gere erros inesperados para campos não fornecidos e que a atualização funcione.
        $updatedData = [
            'cpf' => $cliente->cpf, // Mantém o CPF original (válido)
            'nome' => $updatedNome, // Atualiza o nome
            'data_nascimento' => $cliente->data_nascimento->format('Y-m-d'), // Mantém o original
            'sexo' => $cliente->sexo, // Mantém o original
            'endereco' => $cliente->endereco, // Mantém o original
            'cidade_id' => $cliente->cidade_id, // Mantém o original
        ];

        $response = $this->putJson('/api/clientes/' . $cliente->id, $updatedData);

        $response->assertStatus(200)
                 ->assertJsonFragment(['nome' => $updatedNome]);

        $this->assertDatabaseHas('clientes', [
            'id' => $cliente->id,
            'nome' => $updatedNome,
        ]);
    }

    /** @test */
    public function it_returns_validation_errors_when_updating_a_cliente_with_invalid_data()
    {
        $cliente = Cliente::factory()->create(['cidade_id' => $this->cidade->id]);
        
        // Criamos um segundo cliente para testar a regra 'unique' do CPF
        $outroCliente = Cliente::factory()->create(['cidade_id' => $this->cidade->id]);

        $response = $this->putJson('/api/clientes/' . $cliente->id, [
            // Tentamos atualizar com o CPF de outro cliente, o que deve violar a regra 'unique'
            'cpf' => $outroCliente->cpf,
            // Incluímos outros campos com dados válidos para que não disparem erros de 'required'
            'nome' => $this->faker->name, // Dados válidos para outros campos
            'data_nascimento' => $this->faker->date(),
            'sexo' => $this->faker->randomElement(['M', 'F']),
            'endereco' => $this->faker->address,
            'cidade_id' => $this->cidade->id,
        ]);

        $response->assertStatus(422)
                 // Agora, esperamos um erro de validação apenas para o 'cpf', pois os outros campos são válidos.
                 ->assertJsonValidationErrors(['cpf']);
    }

    /** @test */
    public function it_can_delete_a_cliente()
    {
        $cliente = Cliente::factory()->create(['cidade_id' => $this->cidade->id]);

        $response = $this->deleteJson('/api/clientes/' . $cliente->id);

        $response->assertStatus(204);

        $this->assertDatabaseMissing('clientes', [
            'id' => $cliente->id,
        ]);
    }
}