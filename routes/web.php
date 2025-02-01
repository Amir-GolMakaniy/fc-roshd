<?php

use App\Livewire\Auth\Login;
use App\Livewire\Users\UserCreate;
use App\Livewire\Users\UserEdit;
use App\Livewire\Users\Users;
use App\Livewire\Users\UserShow;
use Illuminate\Support\Facades\Route;

Route::get('/login', Login::class)->name('login')->middleware('guest');

Route::get('/', Users::class)->middleware('auth')->name('home');

Route::get('/create', UserCreate::class)->middleware('auth')
	->name('user-create');

Route::get('/{user}', UserShow::class)->middleware('auth')->name('user-show');

Route::get('/{user}/edit', UserEdit::class)->middleware('auth')
	->name('user-edit');