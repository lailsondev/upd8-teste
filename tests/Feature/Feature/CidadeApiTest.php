<?php

namespace Tests\Feature;

use App\Models\Cidade;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CidadeApiTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_can_list_all_cidades()
    {
        Cidade::factory()->count(3)->create();

        $response = $this->getJson('/api/cidades');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_show_a_single_cidade()
    {
        $cidade = Cidade::factory()->create();

        $response = $this->getJson('/api/cidades/' . $cidade->id);

        $response->assertStatus(200)
                 ->assertJsonFragment(['nome' => $cidade->nome]);
    }

    /** @test */
    public function it_returns_404_if_cidade_not_found()
    {
        $nonExistentId = 999;

        $response = $this->getJson('/api/cidades/' . $nonExistentId);

        $response->assertStatus(404)
                 ->assertJsonFragment([
                     'message' => 'No query results for model [App\\Models\\Cidade] ' . $nonExistentId,
                 ]);
    }
}