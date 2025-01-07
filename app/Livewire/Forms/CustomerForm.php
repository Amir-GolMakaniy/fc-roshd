<?php

namespace App\Livewire\Forms;

use App\Models\Customer;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class CustomerForm extends Form
{
	use WithFileUploads;

	public ?Customer $customer;

	#[Validate('nullable')]
	public $id = null;

	#[Validate('nullable')]
	public $image = null;

	#[Validate('required|string')]
	public $name = null;

	#[Validate('required|string')]
	public $family = null;

	#[Validate('nullable|string')]
	public $father_name = null;

	#[Validate('nullable|numeric|regex:/^\d{10}$/')]
	public $national_code = null;

	#[Validate('nullable|numeric|regex:/^\d{11}$/')]
	public $phone = null;

	#[Validate('nullable|string')]
	public $birthday = null;

	#[Validate('nullable|string')]
	public $one_clothes = null;

	#[Validate('nullable|string')]
	public $two_clothes = null;

	#[Validate('nullable|string')]
	public $shoes = null;

	#[Validate('nullable|string')]
	public $insurance = null;

	#[Validate('nullable')]
	public $months = [];

	public function mount()
	{
		$this->months = array_fill(1, 12, null);
	}

	public function set(Customer $customer)
	{
		$this->customer = $customer;

		$this->fill($customer->only([
			'id',
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
		]));

		$payments = $customer->payments->pluck('paid', 'month')->toArray();
		$this->months = array_replace(array_fill(1, 12, null), $payments);
	}

	public function save()
	{
		$data = $this->validate();

		if ($this->image != $this->customer->image) {
			$customer = Customer::where('id', $data['id'])->first();

			if ($customer && $customer->image) {
				Storage::disk('public')->delete($customer->image);
			}

			$data['image'] = $this->image->store('', 'public');
		}

		$customer = Customer::updateOrCreate(
			['id' => $data['id']],
			$data
		);

		foreach ($this->months as $month => $amount) {
			if ($amount !== null) {
				$customer->payments()->updateOrCreate(
					['month' => $month, 'year' => now()->year],
					['paid' => $amount]
				);
			}
		}
	}
}