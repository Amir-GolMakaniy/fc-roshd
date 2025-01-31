<?php

namespace App\Livewire\Users;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserEdit extends Component
{
	use WithFileUploads;

	public UserForm $form;

	public function mount(User $user)
	{
		$this->form->set($user);
	}

	public function save()
	{
		$this->form->update();
		$this->redirect(route('home'));
	}

	public function render()
	{
		return view('livewire.users.user-edit');
	}
}
