<?php

namespace App\Livewire\Forms;

use App\Models\Customer;
use Livewire\Form;

class CustomerForm extends Form
{
	public ?Customer $customer;

	public $name = null;
	public $family = null;
	public $national_code = null;
	public $phone = null;

	public function set(Customer $customer)
	{
		$this->customer = $customer;
		$this->name = $customer->name;
		$this->family = $customer->family;
		$this->national_code = $customer->national_code;
		$this->phone = $customer->phone;
	}

	public function update()
	{
		$data = $this->validate([
			'name' => 'required|string',
			'family' => 'required|string',
			'national_code' => 'required|numeric|regex:/^\d{10}$/|unique:customers,national_code,' . $this->customer->id,
			'phone' => 'required|numeric|regex:/^\d{11}$/|unique:customers,phone,' . $this->customer->id,
		]);

		$this->customer->update([
			'name' => $data['name'],
			'family' => $data['family'],
			'national_code' => $data['national_code'],
			'phone' => $data['phone'],
			/*'insurance' => $data['insurance'],
			'vest' => intval(str_replace(',', '', $data['vest'])),
			'fee' => intval(str_replace(',', '', $data['fee'])),
			'paid' => intval(str_replace(',', '', $data['paid'])),
			'cut' => intval(str_replace(',', '', $data['cut'])),
			'remained' =>
				intval(str_replace(',', '', $data['fee'])) -
				intval(str_replace(',', '', $data['paid'])) -
				intval(str_replace(',', '', $data['cut'])),*/
		]);
	}

	public function store()
	{
		$data = $this->validate([
			'name' => 'required|string',
			'family' => 'required|string',
			'national_code' => 'required|numeric|regex:/^\d{10}$/|unique:customers,national_code',
			'phone' => 'required|numeric|regex:/^\d{11}$/|unique:customers,phone',
		]);

		Customer::query()->create([
			'name' => $data['name'],
			'family' => $data['family'],
			'national_code' => $data['national_code'],
			'phone' => $data['phone'],
		]);
	}
}
