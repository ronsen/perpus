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
		Schema::create('checkouts', function (Blueprint $table) {
			$table->id();
			$table->foreignId('member_id')->constrained('members')->cascadeOnDelete();
			$table->date('due_date');
			$table->date('return_date')->nullable();
			$table->boolean('returned')->default(false);
			$table->timestamps();
		});

		Schema::create('book_checkout', function (Blueprint $table) {
			$table->id();
			$table->foreignId('checkout_id')->constrained('checkouts');
			$table->foreignId('book_id')->constrained('books');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('checkouts');
		Schema::dropIfExists('book_checkout');
	}
};
