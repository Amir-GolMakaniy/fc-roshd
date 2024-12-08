<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
	public ?User $user;

	#[Validate('required|string')]
	public $name = null;

	#[Validate('required|string')]
	public $family = null;

	#[Validate('required|int|integer|unique:users,national_code')]
	public $national_code = null;

	#[Validate('required|numeric|int|integer|unique:users,phone')]
	public $phone = null;

	#[Validate('nullable|numeric|int|integer')]
	public $fee = null;

	#[Validate('required|numeric|int|integer')]
	public $finish = null;

	public function set(User $user)
	{
		$this->user = $user;
		$this->name = $user->name;
		$this->family = $user->family;
		$this->national_code = $user->national_code;
		$this->phone = $user->phone;
		$this->fee = $user->fee;
		$this->finish = $user->finish;
	}

	public function update()
	{
		$this->validate();

		$this->user->updateOrFail($this->all());
	}

	public function store()
	{
		$this->validate();

		User::query()->createOrFirst($this->all());
	}
}
