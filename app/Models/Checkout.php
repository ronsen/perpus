<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Checkout extends Model
{
	use HasFactory;

	protected $fillable = [
		'member_id',
		'due_date',
		'return_date',
	];

	public function member(): BelongsTo
	{
		return $this->belongsTo(Member::class);
	}

	public function books(): BelongsToMany
	{
		return $this->belongsToMany(Book::class);
	}
}
