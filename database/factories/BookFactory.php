<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'category_id' => Category::inRandomOrder()->first()->id,
			'publisher_id' => Publisher::inRandomOrder()->first()->id,
			'title' => ucwords(fake()->words(3, true)),
		];
	}
}
