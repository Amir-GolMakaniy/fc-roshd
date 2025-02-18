<?php

namespace App\Livewire\Classrooms;

use App\Livewire\Forms\ClassroomForm;
use Livewire\Component;

class ClassroomCreate extends Component
{
	public ClassroomForm $form;

	public function save()
	{
		$this->form->store();
		$this->redirect(route('classrooms'));
	}

	public function render()
	{
		return view('livewire.classrooms.classroom-create');
	}
}
