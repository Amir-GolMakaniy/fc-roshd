<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
		'family',
		'national_code',
		'phone',
		'fee',
		'paid',
		'cut',
		'remained',
	];
}
