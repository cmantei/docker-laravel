<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cita>
 */
class CitaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cliente_id'      => '1',
            'marca'           => $this->faker->word(),
            'modelo'          => $this->faker->word(),
            'matricula'       => $this->faker->word(),
            'fecha'           => $this->faker->date(),
            'hora'            => $this->faker->time(),
            'duracion_estimada'=> $this->faker->numberBetween(15, 180) . 'min',
        ];
    }
}
