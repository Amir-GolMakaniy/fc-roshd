<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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
		'number',
		'insurance',
		'classroom_id',
		'image',
		'placed',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

	public function image()
	{
		return $this->morphOne(Image::class, 'imageable');
	}

	public function payments()
	{
		return $this->hasMany(Payment::class);
	}

	public function classroom()
	{
		return $this->belongsTo(Classroom::class);
	}
}
