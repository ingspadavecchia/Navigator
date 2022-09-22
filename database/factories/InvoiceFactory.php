<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            Invoice::COL_NUMBER => random_int(1,300),
            Invoice::COL_STATUS => Invoice::STATUS_DRAFT,
            Invoice::COL_AMOUNT => null,
            Invoice::COL_POSTED_AT => null,
        ];
    }

    /**
     * Indicate that the invoice is posted.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function posted()
    {
        return $this->state(fn (array $attributes) => [
            Invoice::COL_STATUS => Invoice::STATUS_POSTED,
            Invoice::COL_POSTED_AT => fake()->dateTimeBetween('-1 year', 'now'),
        ]);
    }

}
