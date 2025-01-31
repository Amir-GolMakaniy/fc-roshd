<?php

namespace App\Livewire\Users;

use App\Livewire\Forms\UserForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserCreate extends Component
{
	use WithFileUploads;

	public UserForm $form;

	public function save()
	{
		$this->form->store();
		$this->redirect(route('home'));
	}

	public function render()
	{
		return view('livewire.users.user-create');
	}
}
