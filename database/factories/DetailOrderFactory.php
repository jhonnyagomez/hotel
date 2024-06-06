<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailOrder>
 */
class DetailOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //subtotal
            'quantity' => $this->faker->numberBetween(1, 10),
            'product_id' => \App\Models\Product::factory(),
            'order_id' => \App\Models\Order::factory(),
        ];
    }
}
