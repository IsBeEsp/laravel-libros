<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo'=>$this->faker->unique()->words(random_int(2,5), true),
            'resumen'=>$this->faker->text(),
            'pvp'=>$this->faker->randomFloat(2, 1, 100),
            'stock'=>random_int(0, 999),
            'user_id'=>User::all()->random()->id
        ];
    }
}
