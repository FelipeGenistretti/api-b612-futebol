<?php

namespace Database\Factories;

use App\Models\Jogador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jogador>
 */
class JogadorFactory extends Factory
{
    protected $model = Jogador::class;

    public function definition(): array
    {
        $posicoes = [
            'goleiro',
            'zagueiro',
            'lateral',
            'volante',
            'meio-campista',
            'atacante'
        ];

        return [
            'nome' => $this->faker->name,
            'posicao' => $this->faker->randomElement($posicoes),
            'idade' => $this->faker->numberBetween(16, 40),
            'nacionalidade' => $this->faker->country,
        ];
    }
}
