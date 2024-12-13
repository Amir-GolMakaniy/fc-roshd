<?php

namespace App\Livewire\Users;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
	use WithPagination;

	public UserForm $form;

	protected $paginationTheme = 'bootstrap';

	public function load(User $id)
	{
		$this->form->resetValidation();
		$this->form->set($id);
	}

	public function update()
	{
		$this->form->update();
		$this->redirect(route('users.index'));
	}

	public function store()
	{
		$this->form->store();
		$this->redirect(route('users.index'));
	}

	public function delete(User $user)
	{
		$user->delete();
	}

	public function render()
	{
		return view('livewire.users.users-index', [
			'users' => User::query()->orderByDesc('id')->paginate(20)
		]);
	}
}
