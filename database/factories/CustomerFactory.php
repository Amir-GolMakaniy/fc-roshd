<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Customer>
 */
class CustomerFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'name' => fake()->firstName(),
			'family' => fake()->lastName(),
			'national_code' => fake()->unique()->numberBetween(1111111111, 9999999999),
			'phone' => fake()->phoneNumber(),
		];
	}
}
