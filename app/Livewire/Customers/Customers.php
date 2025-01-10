<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Customers extends Component
{
	use WithPagination;

	public $search = '';

	protected $paginationTheme = 'bootstrap';

	public function delete(Customer $customer)
	{
		if ($customer->image) {
			Storage::disk('public')->delete($customer->image);
		}

		if ($customer->placed) {
			Storage::disk('public')->delete($customer->placed);
		}

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

		return view('livewire.customers.customers', compact('customers'));
	}
}
