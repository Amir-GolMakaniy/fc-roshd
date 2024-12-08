<?php

use App\Livewire\Home;
use App\Livewire\Users\UsersCreate;
use App\Livewire\Users\UsersEdit;
use App\Livewire\Users\UsersIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::prefix('users')->group(function () {
	Route::get('/', UsersIndex::class)->name('users.index');
	Route::get('/create', UsersCreate::class)->name('users.create');
	Route::get('/{id}/edit', UsersEdit::class)->name('users.edit');
});
