<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Manufacturer;
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
            'name' => $this->faker->company,
            'detail' => $this->faker->realText($maxNbChars = 50, $indexSize = 2),
            'manufacturer_id' => Manufacturer::all()->random()
        ];
    }
}
