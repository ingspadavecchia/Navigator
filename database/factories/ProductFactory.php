<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            Product::COL_SKU => fake()->streetSuffix(),
            Product::COL_DESCRIPTION => fake()->realText(100),
            Product::COL_PRICE => fake()->randomFloat(2, 0,99),
        ];
    }

}
