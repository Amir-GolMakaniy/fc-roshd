<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
	use WithPagination;

	public $search = '';

	protected $paginationTheme = 'bootstrap';

	public function delete(User $customer)
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
		$users = User::query()
			->orderByDesc('id')
			->where('name', 'like', '%' . $this->search . '%')
			->orWhere('family', 'like', '%' . $this->search . '%')
			->paginate(10);

		return view('livewire.users.users', compact('users'));
	}
}
