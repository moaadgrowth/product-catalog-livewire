<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Admin: Categories')]
class CategoryIndex extends Component
{
    public string $name = '';

    /** Null = creating a new category; non-null = editing that category’s id. */
    public ?int $editingId = null;

    /**
     * @return array<string, list<string|\Illuminate\Validation\Rules\Unique>>
     */
    protected function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'name')->ignore($this->editingId),
            ],
        ];
    }

    public function save(): void
    {
        $this->validate();

        if ($this->editingId !== null) {
            Category::query()->findOrFail($this->editingId)->update([
                'name' => $this->name,
            ]);
        } else {
            Category::query()->create([
                'name' => $this->name,
            ]);
        }

        $this->resetForm();
    }

    public function edit(int $categoryId): void
    {
        $category = Category::query()->findOrFail($categoryId);

        $this->editingId = $category->id;
        $this->name = $category->name;
    }

    public function cancel(): void
    {
        $this->resetForm();
    }

    public function delete(int $categoryId): void
    {
        Category::query()->findOrFail($categoryId)->delete();

        if ($this->editingId === $categoryId) {
            $this->resetForm();
        }
    }

    public function render(): View
    {
        $categories = Category::query()
            ->orderBy('name')
            ->get();

        return view('livewire.admin.category-index', [
            'categories' => $categories,
        ]);
    }

    private function resetForm(): void
    {
        $this->name = '';
        $this->editingId = null;
    }
}
