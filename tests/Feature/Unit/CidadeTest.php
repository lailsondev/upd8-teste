<?php

namespace Tests\Unit;

use App\Models\Cidade;
use App\Models\Representante;
use App\Models\Cliente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CidadeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_city_can_be_created()
    {
        $cidade = Cidade::create([
            'nome' => 'Belo Horizonte',
            'estado' => 'MG',
        ]);

        $this->assertDatabaseHas('cidades', [
            'nome' => 'Belo Horizonte',
            'estado' => 'MG',
        ]);
        $this->assertInstanceOf(Cidade::class, $cidade);
    }

    /** @test */
    public function a_city_can_be_updated()
    {
        $cidade = Cidade::create([
            'nome' => 'Rio de Janeiro',
            'estado' => 'RJ',
        ]);

        $cidade->update([
            'nome' => 'Rio de Janeiro (Atualizado)',
            'estado' => 'RJ',
        ]);

        $this->assertDatabaseHas('cidades', [
            'id' => $cidade->id,
            'nome' => 'Rio de Janeiro (Atualizado)',
        ]);
    }

    /** @test */
    public function a_city_can_be_deleted()
    {
        $cidade = Cidade::create([
            'nome' => 'São Paulo',
            'estado' => 'SP',
        ]);

        $cidade->delete();

        $this->assertDatabaseMissing('cidades', [
            'id' => $cidade->id,
        ]);
    }

    /** @test */
    public function a_city_has_representantes_relationship()
    {
        $cidade = Cidade::factory()->create();
        Representante::factory()->count(2)->create(['cidade_id' => $cidade->id]);

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $cidade->representantes);
        $this->assertCount(2, $cidade->representantes);
    }

    /** @test */
    public function a_city_has_clientes_relationship()
    {
        $cidade = Cidade::factory()->create();
        Cliente::factory()->count(2)->create(['cidade_id' => $cidade->id]);

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $cidade->clientes);
        $this->assertCount(2, $cidade->clientes);
    }
}