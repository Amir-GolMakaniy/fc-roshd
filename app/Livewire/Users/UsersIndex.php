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
	public $search = '';

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
		$users = User::query()
			->where('name', 'like', '%' . $this->search . '%')
			->orWhere('family', 'like', '%' . $this->search . '%')
			->paginate(10);

		return view('livewire.users.users-index', compact('users'));
	}
}
