<?php

use App\Livewire\Users\UserCreate;
use App\Livewire\Users\UserEdit;
use App\Livewire\Users\Users;
use Illuminate\Support\Facades\Route;


//auth()->loginUsingId(1);
//dd(auth()->user());
Route::get('/', Users::class)->middleware('auth')->name('home');

Route::get('/create', UserCreate::class)->middleware('auth')
	->name('user-create');

Route::get('/{user}/edit', UserEdit::class)->middleware('auth')
	->name('user-edit');