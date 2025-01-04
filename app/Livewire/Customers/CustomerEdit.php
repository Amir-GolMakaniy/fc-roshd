<?php

namespace App\Livewire\Customers;

use App\Livewire\Forms\CustomerForm;
use App\Models\Customer;
use Livewire\Component;
use Livewire\WithFileUploads;

class CustomerEdit extends Component
{
	use WithFileUploads;

	public CustomerForm $form;

	public function mount(Customer $customer)
	{
		$this->form->set($customer);
	}

	public function save()
	{
		$this->form->save();
		$this->redirect(route('home'));
	}

	public function render()
	{
		return view('livewire.customers.customer-edit');
	}
}
