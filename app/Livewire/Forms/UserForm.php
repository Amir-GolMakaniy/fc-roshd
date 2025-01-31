<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class UserForm extends Form
{
	use WithFileUploads;

	public ?User $user;

	#[Validate('required')]
	public $name = null;

	#[Validate('required')]
	public $family = null;

	#[Validate('nullable')]
	public $father_name = null;

	#[Validate('nullable|regex:/^\d{10}$/')]
	public $national_code = null;

	#[Validate('nullable|regex:/^\d{11}$/')]
	public $phone = null;

	#[Validate('nullable')]
	public $birthday = null;

	#[Validate('nullable')]
	public $one_clothes = null;

	#[Validate('nullable')]
	public $two_clothes = null;

	#[Validate('nullable')]
	public $shoes = null;

	#[Validate('nullable')]
	public $number = null;

	#[Validate('nullable')]
	public $insurance = null;

	#[Validate('nullable')]
	public $image = null;

	#[Validate('nullable')]
	public $delete_image = false;

	#[Validate('nullable')]
	public $placed = null;

	#[Validate('nullable')]
	public $delete_placed = false;

	#[Validate('nullable')]
	public $months = [];

	public function mount()
	{
		$this->months = array_fill(1, 12, null);
	}

	public function set(User $user)
	{
		$this->user = $user;

		$this->fill($user->only([
			'image',
			'placed',
			'name',
			'family',
			'father_name',
			'national_code',
			'phone',
			'birthday',
			'one_clothes',
			'two_clothes',
			'shoes',
			'insurance',
		]));

		$payments = $user->payments->pluck('paid', 'month')->toArray();
		$this->months = array_replace(array_fill(1, 12, null), $payments);
	}

	public function update()
	{
		$data = $this->validate();

		if ($this->delete_placed) {
			if ($this->user->placed) {
				Storage::disk('public')->delete($this->user->placed);
			}
			$data['placed'] = null;
		}

		if ($this->placed != $this->user->placed && !$this->delete_placed) {
			if ($this->user->placed) {
				Storage::disk('public')->delete($this->user->placed);
			}
			$data['placed'] = $this->placed->store('', 'public');
		}

		if ($this->delete_image) {
			if ($this->user->image) {
				Storage::disk('public')->delete($this->user->image);
			}
			$data['image'] = null;
		}

		if ($this->image != $this->user->image && !$this->delete_image) {
			if ($this->user->image) {
				Storage::disk('public')->delete($this->user->image);
			}
			$data['image'] = $this->image->store('', 'public');
		}

		$this->user->update($data);

		foreach ($this->months as $month => $amount) {
			if ($amount !== null) {
				$this->user->payments()->updateOrCreate(
					['month' => $month, 'year' => now()->year],
					['paid' => $amount]
				);
			}
		}
	}

	public function store()
	{
		$data = $this->validate();

		if ($this->placed) {
			$data['placed'] = $this->placed->store('', 'public');
		}

		if ($this->image) {
			$data['image'] = $this->image->store('', 'public');
		}

		$user = User::query()->create($data);

		foreach ($this->months as $month => $amount) {
			if ($amount !== null) {
				$user->payments()->create(
					['month' => $month, 'year' => now()->year, 'paid' => $amount]
				);
			}
		}
	}
}