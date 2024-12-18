<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Customer>
 */
class UserFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'name' => $this->faker->name(),
			'family'=>$this->faker->name(),
			'national_code'=>$this->faker->numberBetween(10),
			'phone'=>$this->faker->phoneNumber(),
			'insurance'=>$this->faker->date(),
			'vest'=>$this->faker->numberBetween(100000, 1000000),
			'fee'=>$this->faker->numberBetween(100000, 1000000),
			'paid'=>$this->faker->numberBetween(10000, 100000),
			'cut'=>$this->faker->numberBetween(10000, 100000),
			'remained'=>$this->faker->numberBetween(10000, 100000),
		];
	}
}
