<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 0, 100),
            'store_id' => 1,
            'product_category_id' => $this->faker->numberBetween(2, 10),
            'qty' => $this->faker->numberBetween(177, 1000),
        ];
    }
}
