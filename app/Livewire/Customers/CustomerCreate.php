<?php

namespace App\Livewire\Customers;

use App\Livewire\Forms\CustomerForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class CustomerCreate extends Component
{
	use WithFileUploads;

	public CustomerForm $form;

	public function save()
	{
		$this->form->store();
		$this->redirect(route('home'));
	}

	public function render()
	{
		return view('livewire.customers.customer-create');
	}
}
