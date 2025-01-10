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
		'father_name',
		'national_code',
		'phone',
		'birthday',
		'one_clothes',
		'two_clothes',
		'shoes',
		'insurance',
		'image',
		'placed',
	];

	public function payments()
	{
		return $this->hasMany(Payment::class);
	}
}
