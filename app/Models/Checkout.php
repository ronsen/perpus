<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Checkout extends Model
{
	use HasFactory;

	protected $fillable = [
		'member_id',
		'book_id',
		'start_date',
		'end_date',
		'returned',
	];

	public function book(): BelongsTo
	{
		return $this->belongsTo(Book::class);
	}

	public function member(): BelongsTo
	{
		return $this->belongsTo(Member::class);
	}
}
