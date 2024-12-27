<?php

use App\Livewire\Customers;
use Illuminate\Support\Facades\Route;

Route::get('/', Customers::class)->name('home');
