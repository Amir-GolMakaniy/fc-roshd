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
	public $insurance = null;
	public $vest = null;
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
		$this->insurance = $user->insurance;
		$this->vest = $user->vest;
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
			'insurance' => '',
			'vest' => 'required',
			'fee' => 'required|',
			'paid' => 'required',
			'cut' => 'nullable',
		]);

		$this->user->update([
			'name' => $data['name'],
			'family' => $data['family'],
			'national_code' => $data['national_code'],
			'phone' => $data['phone'],
			'insurance' => $data['insurance'],
			'vest' => intval(str_replace(',', '', $data['vest'])),
			'fee' => intval(str_replace(',', '', $data['fee'])),
			'paid' => intval(str_replace(',', '', $data['paid'])),
			'cut' => intval(str_replace(',', '', $data['cut'])),
			'remained' => intval(str_replace(',', '', $data['fee'])) - intval(str_replace(',', '', $data['paid'])) - intval(str_replace(',', '', $data['cut'])),
		]);
	}

	public function store()
	{
		$data = $this->validate([
			'name' => 'required|string',
			'family' => 'required|string',
			'national_code' => 'required|numeric|regex:/^\d{10}$/|unique:users,national_code',
			'phone' => 'required|numeric|regex:/^\d{11}$/|unique:users,phone',
			'insurance' => '',
			'vest' => 'required',
			'fee' => 'required|',
			'paid' => 'required',
			'cut' => 'nullable',
		]);

		User::query()->create([
			'name' => $data['name'],
			'family' => $data['family'],
			'national_code' => $data['national_code'],
			'phone' => $data['phone'],
			'insurance' => $data['insurance'],
			'vest' => intval(str_replace(',', '', $data['vest'])),
			'fee' => intval(str_replace(',', '', $data['fee'])),
			'paid' => intval(str_replace(',', '', $data['paid'])),
			'cut' => intval(str_replace(',', '', $data['cut'])),
			'remained' => intval(str_replace(',', '', $data['fee'])) - intval(str_replace(',', '', $data['paid'])) - intval(str_replace(',', '', $data['cut'])),
		]);
	}
}
