<?php

namespace App\Livewire\Users;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Component;

class UsersEdit extends Component
{
	public UserForm $form;

	public function mount(User $id)
	{
		$this->form->set($id);
	}

	public function save()
	{
		$this->form->update();
		$this->redirect(route('users.index'));
	}

    public function render()
    {
        return view('livewire.users.users-edit');
    }
}
