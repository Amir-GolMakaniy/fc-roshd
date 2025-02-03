<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Users\UserCreate;
use App\Livewire\Users\UserEdit;
use App\Livewire\Users\Users;
use App\Livewire\Users\UserShow;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
	Route::get('/login', Login::class)->name('login');

	Route::get('/register', Register::class)->name('register');
});

Route::middleware('auth')->group(function () {
	Route::get('/', Users::class)->name('home');

	Route::get('/create', UserCreate::class)->name('user-create');

	Route::get('/{user}', UserShow::class)->name('user-show');

	Route::get('/{user}/edit', UserEdit::class)->name('user-edit');
});