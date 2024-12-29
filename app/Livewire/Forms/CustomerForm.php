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
	public $birthday = null;
	public $insurance = null;

	public function set(Customer $customer)
	{
		$this->customer = $customer;
		$this->name = $customer->name;
		$this->family = $customer->family;
		$this->national_code = $customer->national_code;
		$this->phone = $customer->phone;
		$this->birthday = $customer->birthday;
		$this->insurance = $customer->insurance;
	}

	public function update()
	{
		$data = $this->validate([
			'name' => 'required|string',
			'family' => 'required|string',
			'national_code' => 'required|numeric|regex:/^\d{10}$/|unique:customers,national_code,' . $this->customer->id,
			'phone' => 'required|numeric|regex:/^\d{11}$/|unique:customers,phone,' . $this->customer->id,
			'birthday' => 'required|string',
			'insurance' => 'required|string',
		]);
		$this->customer->update($data);
	}

	public function store()
	{
		$data = $this->validate([
			'name' => 'required|string',
			'family' => 'required|string',
			'national_code' => 'required|numeric|regex:/^\d{10}$/|unique:customers,national_code',
			'phone' => 'required|numeric|regex:/^\d{11}$/|unique:customers,phone',
			'birthday' => 'required|string',
			'insurance' => 'required|string',
		]);
		Customer::query()->create($data);
	}
}
