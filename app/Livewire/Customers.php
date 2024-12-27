<?php

namespace App\Livewire;

use App\Livewire\Forms\CustomerForm;
use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;

class Customers extends Component
{
	use WithPagination;

	public CustomerForm $form;
	public $search = '';

	protected $paginationTheme = 'bootstrap';

	public function load(Customer $id)
	{
		$this->form->resetValidation();
		$this->form->set($id);
	}

	public function update()
	{
		$this->form->update();
		$this->redirect(route('home'));
	}

	public function store()
	{
		$this->form->store();
		$this->redirect(route('home'));
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
