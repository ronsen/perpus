<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		User::factory()->create([
			'name' => 'Administrator',
			'email' => 'admin@example.com',
		]);

		Author::factory(5)->create();
		Publisher::factory(5)->create();
		Category::factory(5)->create();
		Member::factory(20)->create();

		$this->call(BookSeeder::class);
	}
}
