<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'name',
		'address',
		'email',
		'phone_number',
	];

	public function checkouts(): HasMany
	{
		return $this->hasMany(Checkout::class);
	}
}
