<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Form;

class UserForm extends Form
{
	public ?User $user;

	public $name = null;
	public $family = null;
	public $national_code = null;
	public $phone = null;
	public $fee = null;
	public $paid = null;

	public function set(User $user)
	{
		$this->user = $user;
		$this->name = $user->name;
		$this->family = $user->family;
		$this->national_code = $user->national_code;
		$this->phone = $user->phone;
		$this->fee = $user->fee;
		$this->paid = $user->paid;
	}

	public function update()
	{
		$data = $this->validate([
			'name' => 'required|string',
			'family' => 'required|string',
			'national_code' => 'required|numeric|min:10|unique:users,national_code,' . $this->user->id,
			'phone' => 'required|numeric|min:8|unique:users,phone,' . $this->user->id,
			'fee' => 'required|numeric',
			'paid' => 'required|numeric',
		]);

		$this->user->update($data);
	}

	public function store()
	{
		$data = $this->validate([
			'name' => 'required|string',
			'family' => 'required|string',
			'national_code' => 'required|numeric|min:10|unique:users,national_code',
			'phone' => 'required|numeric|min:8|unique:users,phone',
			'fee' => 'required|numeric',
			'paid' => 'required|numeric',
		]);

		User::query()->create($data);
	}
}
