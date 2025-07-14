<?php

namespace Database\Factories;

use App\Models\Representante;
use App\Models\Cidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class RepresentanteFactory extends Factory
{
    protected $model = Representante::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'telefone' => $this->faker->phoneNumber(),
            'cidade_id' => Cidade::factory(),
        ];
    }
}