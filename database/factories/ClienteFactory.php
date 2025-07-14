<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Cidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition(): array
    {
        return [
            'cpf' => $this->faker->unique()->numerify('###########'),
            'nome' => $this->faker->name(),
            'data_nascimento' => $this->faker->date(),
            'sexo' => $this->faker->randomElement(['M', 'F']),
            'endereco' => $this->faker->address(),
            'cidade_id' => Cidade::factory(),
        ];
    }
}