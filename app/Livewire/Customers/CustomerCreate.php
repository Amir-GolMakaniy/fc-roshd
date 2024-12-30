<?php

namespace App\Livewire\Customers;

use App\Livewire\Forms\CustomerForm;
use Livewire\Component;

class CustomerCreate extends Component
{
	public CustomerForm $form;

	public function store()
	{
		$this->form->store();
		$this->redirect(route('home'));
	}

	public function render()
	{
		return view('livewire.customers.customer-create');
	}
}
