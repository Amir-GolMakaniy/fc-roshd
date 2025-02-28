<?php

namespace App\Livewire\Classrooms;

use App\Models\Classroom;
use App\Models\Presence;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class ClassroomShow extends Component
{
	use WithPagination;

	public Classroom $classroom;
	public $search = '';

	protected $paginationTheme = 'bootstrap';

	public function presenceToggle($userId)
	{
		$presence = Presence::query()
			->where('user_id', $userId)
			->where('date', date('Y-m-d'))
			->first();

		if ($presence) {
			$presence->delete();
		} else {
			Presence::query()->create([
				'user_id' => $userId,
				'date' => date('Y-m-d'),
			]);
		}
	}

	public function delete(User $user)
	{
		if ($user->image) {
			Storage::disk('public')->delete($user->image);
		}

		if ($user->placed) {
			Storage::disk('public')->delete($user->placed);
		}

		$user->delete();

		$this->reset();

		$this->render();
	}


	public function render()
	{
		$users = $this->classroom->users()
			->where(function ($query) {
				$query->where('name', 'like', '%' . $this->search . '%')
					->orWhere('family', 'like', '%' . $this->search . '%');
			})
			->orderByDesc('id')
			->paginate(10);

		return view('livewire.classrooms.classroom-show', compact('users'));
	}
}
