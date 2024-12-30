<?php

namespace App\Livewire\Customers;

use App\Livewire\Forms\CustomerForm;
use App\Models\Customer;
use Livewire\Component;

class CustomerEdit extends Component
{
	public CustomerForm $form;

	public function mount(Customer $customer)
	{
		$this->form->set($customer);
	}

	public function update()
	{
		$this->form->update();
		$this->redirect(route('home'));
	}

	public function render()
	{
		return view('livewire.customers.customer-edit');
	}
}
