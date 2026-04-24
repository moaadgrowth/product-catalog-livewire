<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Admin: Products')]
class ProductIndex extends Component
{
    public string $name = '';

    public string $description = '';

    /** Use a string in the form; cast/validate before saving. */
    public string $price = '';

    /** Selected category ids from <select multiple>. */
    public array $categoryIds = [];

    /** Null = creating; set = editing that product id. */
    public ?int $editingId = null;

    protected function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'description' => [
                'nullable',
                'string',
            ],
            'price' => [
                'required',
                'numeric',
            ],
            'categoryIds' => ['array'],
            'categoryIds.*' => ['integer', 'exists:categories,id'],
        ];
    }

    public function save(): void
    {
        $this->validate();

        if ($this->editingId !== null) {
            $product = Product::query()->findOrFail($this->editingId);
            $product->update([
                'name' => $this->name,
                'description' => $this->description !== '' ? $this->description : null,
                'price' => $this->price,
            ]);
        } else {
            $product = Product::query()->create([
                'name' => $this->name,
                'description' => $this->description !== '' ? $this->description : null,
                'price' => $this->price,
            ]);
        }

        $product->categories()->sync($this->categoryIds);

        $this->resetForm();
    }

    public function edit(int $productId): void
    {
        $product = Product::query()->with('categories')->findOrFail($productId);

        $this->editingId = $product->id;
        $this->name = $product->name;
        $this->description = $product->description ?? '';
        $this->price = $product->price;

        $this->categoryIds = $product->categories->pluck('id')->all();
    }

    public function cancel(): void
    {
        $this->resetForm();
    }

    public function delete(int $productId): void
    {
        Product::query()->findOrFail($productId)->delete();

        if ($this->editingId === $productId) {
            $this->resetForm();
        }
    }

    public function render(): View
    {
        $products = Product::query()
            ->with('categories')
            ->orderBy('name')
            ->get();

        $categories = Category::query()
            ->orderBy('name')
            ->get();

        return view('livewire.admin.product-index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    private function resetForm(): void
    {
        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->categoryIds = [];
        $this->editingId = null;
    }
}
