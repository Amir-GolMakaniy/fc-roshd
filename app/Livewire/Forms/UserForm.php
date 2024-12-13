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
	public $cut = null;

	public function set(User $user)
	{
		$this->user = $user;
		$this->name = $user->name;
		$this->family = $user->family;
		$this->national_code = $user->national_code;
		$this->phone = $user->phone;
		$this->fee = $user->fee;
		$this->paid = $user->paid;
		$this->cut = $user->cut;
	}

	public function update()
	{
		$data = $this->validate([
			'name' => 'required|string',
			'family' => 'required|string',
			'national_code' => 'required|numeric|regex:/^\d{10}$/|unique:users,national_code,' . $this->user->id,
			'phone' => 'required|numeric|regex:/^\d{11}$/|unique:users,phone,' . $this->user->id,
			'fee' => 'required|numeric',
			'paid' => 'required|numeric',
			'cut' => 'nullable|numeric',
		]);

		$this->user->update([
			'name' => $data['name'],
			'family' => $data['family'],
			'national_code' => $data['national_code'],
			'phone' => $data['phone'],
			'fee' => $data['fee'],
			'paid' => $data['paid'],
			'cut' => $data['cut'],
			'remained' => $data['fee'] - $data['paid'] - $data['cut'],
		]);
	}

	public function store()
	{
		$data = $this->validate([
			'name' => 'required|string',
			'family' => 'required|string',
			'national_code' => 'required|numeric|regex:/^\d{10}$/|unique:users,national_code',
			'phone' => 'required|numeric|regex:/^\d{11}$/|unique:users,phone',
			'fee' => 'required|numeric',
			'paid' => 'required|numeric',
			'cut' => 'nullable|numeric',
		]);

		User::query()->create([
			'name' => $data['name'],
			'family' => $data['family'],
			'national_code' => $data['national_code'],
			'phone' => $data['phone'],
			'fee' => $data['fee'],
			'paid' => $data['paid'],
			'cut' => $data['cut'],
			'remained' => $data['fee'] - $data['paid'] - $data['cut'],
		]);
	}
}
