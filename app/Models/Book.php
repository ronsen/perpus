<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'category_id',
		'publisher_id',
		'author_id',
		'title',
		'stock',
	];

	public function category(): BelongsTo
	{
		return $this->belongsTo(Category::class);
	}

	public function publisher(): BelongsTo
	{
		return $this->belongsTo(Publisher::class);
	}

	public function authors(): BelongsToMany
	{
		return $this->belongsToMany(Author::class);
	}

	public function checkouts(): BelongsToMany
	{
		return $this->BelongsToMany(Checkout::class);
	}
}
