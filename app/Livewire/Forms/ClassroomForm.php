<?php

namespace App\Livewire\Forms;

use App\Models\Classroom;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ClassroomForm extends Form
{
	public ?Classroom $classroom;

	#[Validate('required|string')]
	public $name = null;

	#[Validate('nullable')]
	public $users = [];

	public function mount(Classroom $classroom = null)
	{
		$this->classroom = $classroom;

		if ($classroom) {
			$this->fill($classroom->only(['name']));
			$this->users = $classroom->users->pluck('id')->toArray();  // بارگذاری کاربران موجود
		}
	}

	public function set(Classroom $classroom)
	{
		$this->classroom = $classroom;
		$this->fill($classroom->only(['name']));
		$this->users = $classroom->users->pluck('id')->toArray();
	}

	public function update()
	{
		$data = $this->validate();

		// بروزرسانی اطلاعات کلاس
		$this->classroom->update($data);

		// حذف کاربران قبلی و اضافه کردن کاربران جدید
		$this->classroom->users()->delete(); // ابتدا کاربران قبلی را حذف می‌کنیم

		// اضافه کردن کاربران جدید
		$users = User::find($this->users);
		foreach ($users as $user) {
			$user->classroom_id = $this->classroom->id;  // به کلاس جدید نسبت داده می‌شود
			$user->save();
		}
	}

	public function store()
	{
		$data = $this->validate();

		$classroom = Classroom::query()->create($data);

		// اضافه کردن کاربران به کلاس جدید
		$users = User::find($this->users);
		foreach ($users as $user) {
			$user->classroom_id = $classroom->id;  // به کلاس جدید نسبت داده می‌شود
			$user->save();
		}
	}

	public function getUsersProperty()
	{
		return User::all();  // اینجا می‌توانید لیست کاربران را بارگذاری کنید
	}
}
