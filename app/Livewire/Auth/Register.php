<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{
	public $name, $family;

	public function register()
	{
		$this->validate([
			'name' => 'required|string|unique:users',
			'family' => 'required|string|unique:users',
		]);

		// ایجاد کاربر جدید
		$user = User::create([
			'name' => $this->name,
			'family' => $this->family,
		]);

		// لاگین خودکار کاربر بعد از ثبت‌نام
		Auth::login($user);

		return redirect()->route('user-show',auth()->id()); // تغییر مسیر بعد از ثبت‌نام
	}

	public function render()
	{
		return view('livewire.auth.register');
	}
}