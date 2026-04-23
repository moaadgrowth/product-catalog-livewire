<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Products')]
class ProductIndex extends Component
{
    /** Selected category id from the select; empty string = "all". */
    public string $categoryId = '';

    public function render(): View
    {
        $products = Product::query()
            ->with('categories')
            ->when(
                $this->categoryId !== '',
                function ($query): void {
                    $query->whereHas(
                        'categories',
                        fn($q) => $q->where('categories.id', (int) $this->categoryId),
                    );
                },
            )
            ->orderBy('name')
            ->get();

        $categories = Category::query()
            ->orderBy('name')
            ->get();

        return view('livewire.product-index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
