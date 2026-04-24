<?php

use App\Livewire\Admin\CategoryIndex;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\ProductIndex as AdminProductIndex;
use App\Livewire\ProductIndex;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home.index');

Route::get('/products', ProductIndex::class)->name('products.index');

Route::get('/admin', Dashboard::class)->name('admin.dashboard');
Route::get('/admin/products', AdminProductIndex::class)->name('admin.products.index');
Route::get('/admin/categories', CategoryIndex::class)->name('admin.categories.index');
