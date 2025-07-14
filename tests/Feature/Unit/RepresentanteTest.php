<?php

namespace Tests\Unit;

use App\Models\Representante;
use App\Models\Cidade;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RepresentanteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_representative_can_be_created()
    {
        $cidade = Cidade::factory()->create();
        $representante = Representante::create([
            'nome' => 'João Silva',
            'email' => 'joao.silva@example.com',
            'telefone' => '11999999999',
            'cidade_id' => $cidade->id,
        ]);

        $this->assertDatabaseHas('representantes', [
            'nome' => 'João Silva',
            'email' => 'joao.silva@example.com',
        ]);
        $this->assertInstanceOf(Representante::class, $representante);
    }

    /** @test */
    public function a_representative_can_be_updated()
    {
        $cidade = Cidade::factory()->create();
        $representante = Representante::factory()->create(['cidade_id' => $cidade->id]);

        $representante->update([
            'email' => 'novo.email@example.com',
        ]);

        $this->assertDatabaseHas('representantes', [
            'id' => $representante->id,
            'email' => 'novo.email@example.com',
        ]);
    }

    /** @test */
    public function a_representative_can_be_deleted()
    {
        $cidade = Cidade::factory()->create();
        $representante = Representante::factory()->create(['cidade_id' => $cidade->id]);

        $representante->delete();

        $this->assertDatabaseMissing('representantes', [
            'id' => $representante->id,
        ]);
    }

    /** @test */
    public function a_representative_belongs_to_a_city()
    {
        $cidade = Cidade::factory()->create();
        $representante = Representante::factory()->create(['cidade_id' => $cidade->id]);

        $this->assertInstanceOf(Cidade::class, $representante->cidade);
        $this->assertEquals($cidade->id, $representante->cidade->id);
    }
}