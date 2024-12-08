<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
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
			'national_code'=>$this->faker->randomNumber(9),
			'phone'=>$this->faker->phoneNumber(),
			'fee'=>$this->faker->numberBetween(10000, 100000),
			'finish'=>$this->faker->numberBetween(10000, 100000),
		];
	}
}
