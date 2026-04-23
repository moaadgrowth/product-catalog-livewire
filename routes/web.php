<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ProductIndex;

Route::view('/', 'welcome')->name('home');

# Products 
Route::get('/products', ProductIndex::class)->name('products.index');

