<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	use HasFactory;

	protected $fillable = [
		'image',
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
	];

	public function payments()
	{
		return $this->hasMany(Payment::class);
	}
}
