<?php

namespace Database\Factories;

use App\Models\Professor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfessorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Professor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'data_nascimento' => $this->faker->date(),
            'profissao' => $this->faker->valid()->randomElement([1, 2, 3]),
            'registro_profissional' => rand(1000000, 9999999),
            'sexo' => $this->faker->valid()->randomElement(['Masculino', 'Feminino']),
            'telefone' => $this->faker->phoneNumber,
            'cep' => str_replace("-", "", $this->faker->postcode),
            'endereco_rua' => $this->faker->streetName,
            'endereco_numero' => $this->faker->buildingNumber,
            'endereco_estado' => $this->faker->state,
            'endereco_cidade' => $this->faker->city,
            'endereco_bairro' => $this->faker->word(),
            'cpf' => $this->faker->cpf(false)
        ];
    }
}
