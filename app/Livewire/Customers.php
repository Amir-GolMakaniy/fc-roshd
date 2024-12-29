<?php

namespace App\Livewire;

use App\Livewire\Forms\CustomerForm;
use App\Models\Customer;
use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class Customers extends Component
{
	use WithPagination;

	public CustomerForm $form;
	public $search = '';

	protected $paginationTheme = 'bootstrap';

	public function load(Customer $customer)
	{
		$this->form->resetValidation();
		$this->form->set($customer);
	}

	public function store()
	{
		$this->form->store();
		$this->redirect(route('home'));
	}

	public function toggleShoes(Customer $customer)
	{
		$customer->update([
			'shoes' => !$customer->shoes
		]);
	}

	public function toggleOne_clothes(Customer $customer)
	{
		$customer->update([
			'one_clothes' => !$customer->one_clothes
		]);
	}

	public function toggleTwo_clothes(Customer $customer)
	{
		$customer->update([
			'two_clothes' => !$customer->two_clothes
		]);
	}

	public function update()
	{
		$this->form->update();
		$this->redirect(route('home'));
	}

	public function togglePayment($customer, $month)
	{
		$payment = Payment::query()->firstOrNew([
			'customer_id' => $customer,
			'month' => $month,
			'year' => now()->year,
		]);

		// تغییر مقدار is_paid به حالت مقابل
		$payment->is_paid = !$payment->is_paid;

		// ذخیره تغییرات
		$payment->save();
	}

	public function delete(Customer $customer)
	{
		$customer->delete();
		$this->reset();
		$this->render();
	}

	public function render()
	{
		$customers = Customer::query()
			->orderByDesc('id')
			->where('name', 'like', '%' . $this->search . '%')
			->orWhere('family', 'like', '%' . $this->search . '%')
			->paginate(10);

		return view('livewire.customers', compact('customers'));
	}
}
