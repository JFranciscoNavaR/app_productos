<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'codigo' => $this->faker->numberBetween($min = 1000000000, $max = 9000000000), 
            'nombre' => $this->faker->name,
            'marca' => 'Marca de Prueba',
            'descripcion' => 'Productos de Prueba',  
            'precio' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'cantidad' => $this->faker->numberBetween($min = 0, $max = 1000),
            'statu_id' => User::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }
}
