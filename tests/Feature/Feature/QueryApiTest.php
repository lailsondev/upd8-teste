<?php

namespace Tests\Feature;

use App\Models\Cliente;
use App\Models\Cidade;
use App\Models\Representante;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QueryApiTest extends TestCase
{
    use RefreshDatabase;

    protected Cidade $cidadeA;
    protected Cidade $cidadeB;
    protected Cliente $clienteA;
    protected Cliente $clienteB;
    protected Representante $representanteA;
    protected Representante $representanteB;
    protected Representante $representanteC;

    protected function setUp(): void
    {
        parent::setUp();

        $this->cidadeA = Cidade::factory()->create(['nome' => 'Cidade A']);
        $this->cidadeB = Cidade::factory()->create(['nome' => 'Cidade B']);

        $this->clienteA = Cliente::factory()->create(['cidade_id' => $this->cidadeA->id]);
        $this->clienteB = Cliente::factory()->create(['cidade_id' => $this->cidadeB->id]);

        $this->representanteA = Representante::factory()->create(['cidade_id' => $this->cidadeA->id, 'nome' => 'Rep A']);
        $this->representanteB = Representante::factory()->create(['cidade_id' => $this->cidadeA->id, 'nome' => 'Rep B']);
        $this->representanteC = Representante::factory()->create(['cidade_id' => $this->cidadeB->id, 'nome' => 'Rep C']);
    }

    /** @test */
    public function it_can_get_representantes_by_cliente_id()
    {
        $response = $this->getJson("/api/clientes/{$this->clienteA->id}/representantes");

        $response->assertStatus(200)
                 ->assertJsonCount(2)
                 ->assertJsonFragment(['nome' => 'Rep A'])
                 ->assertJsonFragment(['nome' => 'Rep B'])
                 ->assertJsonMissing(['nome' => 'Rep C']);
    }

    /** @test */
    public function it_returns_404_when_getting_representantes_for_non_existent_cliente()
    {
        $response = $this->getJson('/api/clientes/9999/representantes');

        $response->assertStatus(404)
                 ->assertJsonFragment(['message' => 'No query results for model [App\\Models\\Cliente] 9999']);
    }

    /** @test */
    public function it_can_get_representantes_by_cidade_id()
    {
        $response = $this->getJson("/api/cidades/{$this->cidadeA->id}/representantes");

        $response->assertStatus(200)
                 ->assertJsonCount(2)
                 ->assertJsonFragment(['nome' => 'Rep A'])
                 ->assertJsonFragment(['nome' => 'Rep B'])
                 ->assertJsonMissing(['nome' => 'Rep C']);
    }

    /** @test */
    public function it_returns_404_when_getting_representantes_for_non_existent_cidade()
    {
        $response = $this->getJson('/api/cidades/9999/representantes');

        $response->assertStatus(404)
                 ->assertJsonFragment(['message' => 'No query results for model [App\\Models\\Cidade] 9999']);
    }
}