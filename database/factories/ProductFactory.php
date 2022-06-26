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
            'name' => $this->faker->sentence(1),
            'description' => $this->faker->sentence(5),
            'sell_price' => $this->faker->numberBetween(1000, 100000),
            'buy_price' => $this->faker->numberBetween(1000, 100000),
            'image_url' => $this->faker->imageUrl(640, 480, 'products', true),
        ];
    }
}
