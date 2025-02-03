<?php

namespace App\Livewire\Users;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserShow extends Component
{
	use WithFileUploads;

	public User $user;
	public UserForm $form;
	public $isEditing = null;

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
		return view('livewire.users.user-show');
	}
}
