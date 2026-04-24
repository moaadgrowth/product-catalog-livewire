<?php

use App\Livewire\Admin\CategoryIndex;
use App\Livewire\Admin\ProductIndex as AdminProductIndex;
use App\Livewire\ProductIndex;
use Illuminate\Support\Facades\Route;

# Welcome page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

# Products 
Route::get('/products', ProductIndex::class)->name('products.index');

# Admin: Categories
Route::get('/admin/categories', CategoryIndex::class)->name('admin.categories.index');

# Admin: Products
Route::get('/admin/products', AdminProductIndex::class)->name('admin.products.index');
