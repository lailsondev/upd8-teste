<?php

namespace Tests\Feature;

use App\Models\Representante;
use App\Models\Cidade;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RepresentanteApiTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected Cidade $cidade;

    protected function setUp(): void
    {
        parent::setUp();
        $this->cidade = Cidade::factory()->create();
    }

    /** @test */
    public function it_can_list_all_representantes()
    {
        Representante::factory()->count(3)->create(['cidade_id' => $this->cidade->id]);

        $response = $this->getJson('/api/representantes');

        $response->assertStatus(200)
                 ->assertJsonCount(3, 'data');
    }

    /** @test */
    public function it_can_create_a_representante()
    {
        $representanteData = [
            'nome' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'telefone' => $this->faker->phoneNumber,
            'cidade_id' => $this->cidade->id,
        ];

        $response = $this->postJson('/api/representantes', $representanteData);

        $response->assertStatus(201)
                 ->assertJsonFragment(['nome' => $representanteData['nome']]);

        $this->assertDatabaseHas('representantes', [
            'email' => $representanteData['email'],
        ]);
    }

    /** @test */
    public function it_returns_validation_errors_when_creating_a_representante_with_invalid_data()
    {
        $response = $this->postJson('/api/representantes', [
            'nome' => '',
            'email' => 'invalid-email',
            'cidade_id' => 999,
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['nome', 'email', 'cidade_id']);
    }

    /** @test */
    public function it_can_show_a_single_representante()
    {
        $representante = Representante::factory()->create(['cidade_id' => $this->cidade->id]);

        $response = $this->getJson('/api/representantes/' . $representante->id);

        $response->assertStatus(200)
                 ->assertJsonFragment(['nome' => $representante->nome]);
    }

    /** @test */
    public function it_returns_404_if_representante_not_found()
    {
        $response = $this->getJson('/api/representantes/999');

        $response->assertStatus(404)
                 ->assertJsonFragment(['message' => 'No query results for model [App\\Models\\Representante] 999']);
    }

    /** @test */
    public function it_can_update_a_representante()
    {
        $representante = Representante::factory()->create(['cidade_id' => $this->cidade->id]);
        $updatedEmail = 'updated.email@example.com';

        $response = $this->putJson('/api/representantes/' . $representante->id, [
            'email' => $updatedEmail,
        ]);

        $response->assertStatus(200)
                 ->assertJsonFragment(['email' => $updatedEmail]);

        $this->assertDatabaseHas('representantes', [
            'id' => $representante->id,
            'email' => $updatedEmail,
        ]);
    }

    /** @test */
    public function it_returns_validation_errors_when_updating_a_representante_with_invalid_data()
    {
        $representante = Representante::factory()->create(['cidade_id' => $this->cidade->id]);
        $response = $this->putJson('/api/representantes/' . $representante->id, [
            'email' => 'invalid-email',
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['email']);
    }

    /** @test */
    public function it_can_delete_a_representante()
    {
        $representante = Representante::factory()->create(['cidade_id' => $this->cidade->id]);

        $response = $this->deleteJson('/api/representantes/' . $representante->id);

        $response->assertStatus(204);

        $this->assertDatabaseMissing('representantes', [
            'id' => $representante->id,
        ]);
    }
}