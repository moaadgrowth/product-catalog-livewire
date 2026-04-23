<?php

use App\Livewire\Admin\CategoryIndex;
use App\Livewire\ProductIndex;
use Illuminate\Support\Facades\Route;

# Products 
Route::get('/products', ProductIndex::class)->name('products.index');

# Admin: Categories
Route::get('/admin/categories', CategoryIndex::class)->name('admin.categories.index');
