<?php

namespace App\Livewire\Classrooms;

use App\Models\Classroom;
use Livewire\Component;
use Livewire\WithPagination;

class Classrooms extends Component
{
	use WithPagination;

	public $search = '';

	protected $paginationTheme = 'bootstrap';

	public function delete(Classroom $classroom)
	{
		$classroom->delete();

		$this->reset();

		$this->render();
	}


	public function render()
	{
		$classrooms = Classroom::query()
			->orderByDesc('id')
			->where('name', 'like', '%' . $this->search . '%')
			->paginate(10);

		return view('livewire.classrooms.classrooms', compact('classrooms'));
	}
}
