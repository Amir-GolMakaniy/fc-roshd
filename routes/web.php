<?php

use App\Livewire\Customers\CustomerCreate;
use App\Livewire\Customers\CustomerEdit;
use App\Livewire\Customers\Customers;
use Illuminate\Support\Facades\Route;

Route::get('/', Customers::class)->middleware('auth')->name('home');
Route::get('/create', CustomerCreate::class)->middleware('auth')->name('customer-create');
Route::get('/{customer}/edit', CustomerEdit::class)->middleware('auth')->name('customer-edit');

require __DIR__ . '/auth.php';