<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('books', function (Blueprint $table) {
			$table->id();
			$table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
			$table->foreignId('publisher_id')->constrained('publishers')->cascadeOnDelete();
			$table->string('title');
			$table->unsignedInteger('stock')->default(0);
			$table->softDeletes();
			$table->timestamps();
		});

		Schema::create('author_book', function (Blueprint $table) {
			$table->id();
			$table->foreignId('author_id')->constrained('authors')->cascadeOnDelete();
			$table->foreignId('book_id')->constrained('books')->cascadeOnDelete();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('books');
		Schema::dropIfExists('author_book');
	}
};
