<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inmueble>
 */
class InmuebleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(5),
            'image' => $this->faker->sentence(10) . 'jpg',
            'descripcion' => $this->faker->sentence(20),
            'habitaciones' => $this->faker->randomElement([1,2,3,4]),
            'estacionamiento' => $this->faker->randomElement([1,2]),
            'WC' => $this->faker->randomElement([1,2,3,4]),
            'calle' => $this->faker->address(),
            'lat' => $this->faker->latitude(),
            'lng' => $this->faker->longitude(),
            'publicado' => $this->faker->boolean(),
            'categoria_id' => $this->faker->randomElement([1,2,3,4,5]),
            'precio_id' => $this->faker->randomElement([1,2,3,4,5,6,7,8,9]),
            'user_id' => $this->faker->randomElement([1,2,3,4,5]),
        ];
    }
}
