<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo' => $this->faker->numberBetween($min = 10000, $max = 90000), 
            'descripcion' => 'Productos de Prueba', 
            'cantidad' => $this->faker->randomNumber($nbDigits = Null, $strict = false), 
            'precio' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        ];
    }
}