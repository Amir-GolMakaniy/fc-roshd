<?php

use App\Livewire\Customers;
use Illuminate\Support\Facades\Route;

Route::get('/', Customers::class)->middleware('auth')->name('home');

require __DIR__ . '/auth.php';