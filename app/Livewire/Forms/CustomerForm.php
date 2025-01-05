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

	#[Validate('nullable|image')]
	public $image = null;

	#[Validate('required|string')]
	public $name = null;

	#[Validate('required|string')]
	public $family = null;

	#[Validate('nullable|string')]
	public $father_name = null;

	#[Validate('nullable|numeric|regex:/^\d{10}$/|unique:customers')]
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

		// چک کردن اگر عکسی باشد
		if ($this->image) {
			// گرفتن مشتری بر اساس کد ملی
			$customer = Customer::where('id', $data['id'])->first();

			// حذف عکس قبلی اگر وجود داشته باشد
			if ($customer && $customer->image) {
				Storage::disk('public')->delete($customer->image);
			}

			// ذخیره عکس جدید
			$data['image'] = $this->image->store('', 'public');
		}

		// ایجاد یا بروزرسانی مشتری
		$customer = Customer::updateOrCreate(
			['id' => $data['id']],
			$data
		);

		// آپدیت یا ایجاد پرداخت‌ها
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