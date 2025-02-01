<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
	public $name, $family, $remember = false;

	public function login()
	{
		$this->validate([
			'name' => 'required|string',
			'family' => 'required|string',
		]);

		// پیدا کردن کاربر بر اساس name و family
		$user = User::where('name', $this->name)->where('family', $this->family)->first();

		if (!$user) {
			session()->flash('error', 'نام یا نام خانوادگی اشتباه است.');
			return;
		}

		// لاگین کردن کاربر
		Auth::login($user, $this->remember);

		return redirect()->route('home'); // تغییر مسیر بعد از ورود
	}

	public function render()
	{
		return view('livewire.auth.login');
	}
}

