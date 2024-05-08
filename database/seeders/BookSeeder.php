<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$books = Book::factory(50)->create();

		foreach ($books as $book) {
			$book->authors()->attach(Author::inRandomOrder()
				->limit(rand(1, 5))
				->get()
				->pluck('id')
				->toArray());
		}
	}
}
