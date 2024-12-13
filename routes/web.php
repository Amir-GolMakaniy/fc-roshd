<?php

use App\Livewire\Users\UsersIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', UsersIndex::class)->name('users.index');
