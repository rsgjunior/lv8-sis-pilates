<?php

namespace Database\Factories;

use App\Models\Aluno;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlunoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Aluno::class;

    protected $faker = Factory::create('pt_BR');

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'data_nascimento' => $this->faker->date(),
            'profissao' => $this->faker->word(),
            'sexo' => $this->faker->valid()->randomElement(['Masculino', 'Feminino']),
            'telefone' => $this->faker->phoneNumber(),
            'telefone2' => $this->faker->optional()->phoneNumber(),
            'rg' => $this->faker->rg(false),
            'cpf' => $this->faker->cpf(false)
        ];
    }
}
