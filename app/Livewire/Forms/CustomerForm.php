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
	public $one_clothes = null;
	public $two_clothes = null;
	public $shoes = null;
	public $insurance = null;
	public $months = [];

	public function mount()
	{
		$this->months = array_fill(1, 12, null);
	}

	public function set(Customer $customer)
	{
		$this->customer = $customer;
		$this->name = $customer->name;
		$this->family = $customer->family;
		$this->national_code = $customer->national_code;
		$this->phone = $customer->phone;
		$this->birthday = $customer->birthday;
		$this->one_clothes = $customer->one_clothes;
		$this->two_clothes = $customer->two_clothes;
		$this->shoes = $customer->shoes;
		$this->insurance = $customer->insurance;
		$payments = $customer->payments->pluck('paid', 'month')->toArray();
		$this->months = array_replace(array_fill(1, 12, null), $payments);
	}

	public function update()
	{
		$data = $this->validate([
			'name' => 'required|string',
			'family' => 'required|string',
			'national_code' => 'required|numeric|regex:/^\d{10}$/|unique:customers,national_code,' . $this->customer->id,
			'phone' => 'required|numeric|regex:/^\d{11}$/',
			'birthday' => 'required|string',
			'one_clothes' => 'nullable|string',
			'two_clothes' => 'nullable|string',
			'shoes' => 'nullable|string',
			'insurance' => 'nullable|string',
			'months' => 'nullable',
		]);

		$this->customer->update($data);

		foreach ($this->months as $month => $amount) {
			if ($amount != null) {
				$this->customer->payments()->create([
					'paid' => $amount,
					'month' => $month,
					'year' => now()->year
				]);
			}
		}
	}

	public function store()
	{
		$data = $this->validate([
			'name' => 'required|string',
			'family' => 'required|string',
			'national_code' => 'required|numeric|regex:/^\d{10}$/|unique:customers,national_code',
			'phone' => 'required|numeric|regex:/^\d{11}$/',
			'birthday' => 'required|string',
			'one_clothes' => 'nullable|string',
			'two_clothes' => 'nullable|string',
			'shoes' => 'nullable|string',
			'insurance' => 'nullable|string',
			'months' => 'nullable',
		]);

		$customer = Customer::create($data);

		foreach ($this->months as $month => $amount) {
			if ($amount !== null) {
				$customer->payments()->create([
					'paid' => $amount,
					'month' => $month,
					'year' => now()->year,
				]);
			}
		}
	}
}
