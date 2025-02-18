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
	public $filter = false;

	protected $paginationTheme = 'bootstrap';

	public function filterToggle()
	{
		$this->filter = !$this->filter;
	}

	public function delete(User $user)
	{
		if ($user->image) {
			Storage::disk('public')->delete($user->image);
		}

		if ($user->placed) {
			Storage::disk('public')->delete($user->placed);
		}

		$user->delete();

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

		if ($this->filter){
			$users = User::query()
				->leftJoin('payments', 'users.id', '=', 'payments.user_id')
				->whereNull('payments.id')
				->select('users.*')
				->orderByDesc('id')
				->paginate(10);
		}

		return view('livewire.users.users', compact('users'));
	}
}
