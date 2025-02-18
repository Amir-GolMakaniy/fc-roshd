<?php

namespace App\Livewire\Classrooms;

use App\Livewire\Forms\ClassroomForm;
use App\Models\Classroom;
use Livewire\Component;

class ClassroomEdit extends Component
{
	public ClassroomForm $form;

	public function mount(Classroom $classroom)
	{
		$this->form->set($classroom);
	}

	public function save()
	{
		$this->form->update();
		$this->redirect(route('classrooms'));
	}

	public function render()
	{
		return view('livewire.classrooms.classroom-edit');
	}
}
