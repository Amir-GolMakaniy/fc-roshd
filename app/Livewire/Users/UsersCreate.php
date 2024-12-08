<?php

namespace App\Livewire\Users;

use App\Livewire\Forms\UserForm;
use Livewire\Component;

class UsersCreate extends Component
{
	public UserForm $form;

	public function save()
	{
		$this->form->store();
		$this->redirect(route('users.index'));
	}

	public function render()
	{
		return view('livewire.users.users-create');
	}
}
