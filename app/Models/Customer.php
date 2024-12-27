<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
		'family',
		'national_code',
		'phone',
		'shoes',
	];

	public function payments()
	{
		return $this->hasMany(Payment::class);
	}
}
