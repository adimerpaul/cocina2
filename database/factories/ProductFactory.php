<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->lastName,
            'cantidad'=>$this->faker->randomDigit,
            'precio'=>$this->faker->randomFloat(2, $min = 25, $max = 100),
            'photo'=>'',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
    }
}
