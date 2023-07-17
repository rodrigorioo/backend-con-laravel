<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoriaId = Categoria::inRandomOrder()
            ->first()
            ->id;

        return [
            'categoria_id' => $categoriaId,
            'nombre' => 'Producto '.rand(1, 9999).' - '.$this->faker->word,
            'stock' => rand(1, 50),
            'precio' => $this->faker->randomFloat(2, 50, 10000),
        ];
    }
}
