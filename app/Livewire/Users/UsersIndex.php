<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
	use WithPagination;

	protected $paginationTheme = 'simple-bootstrap';

	public function render()
	{
		return view('livewire.users.users-index', [
			'users' => User::query()->orderByDesc('id')->paginate(20)
		]);
	}
}
