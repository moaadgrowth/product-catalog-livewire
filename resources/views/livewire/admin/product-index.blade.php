<div class="mx-auto max-w-4xl space-y-8 p-6">
    <h1 class="font-display text-2xl font-semibold text-stone-900">Products</h1>

    <form wire:submit="save" class="space-y-4 rounded-2xl border border-stone-200/80 bg-white/80 p-5 shadow-sm">
        <div class="grid gap-4 sm:grid-cols-2">
            <div class="sm:col-span-2">
                <label for="product-name" class="mb-1 block text-sm font-medium text-stone-700">Name</label>
                <input id="product-name" type="text" wire:model="name"
                    class="w-full rounded-lg border border-stone-300 bg-white px-3 py-2 text-sm text-stone-900 shadow-sm focus:border-amber-600 focus:outline-none focus:ring-1 focus:ring-amber-500"
                    autocomplete="off" />
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="sm:col-span-2">
                <label for="product-description"
                    class="mb-1 block text-sm font-medium text-stone-700">Description</label>
                <textarea id="product-description" wire:model="description" rows="3"
                    class="w-full rounded-lg border border-stone-300 bg-white px-3 py-2 text-sm text-stone-900 shadow-sm focus:border-amber-600 focus:outline-none focus:ring-1 focus:ring-amber-500"></textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="product-price" class="mb-1 block text-sm font-medium text-stone-700">Price</label>
                <input id="product-price" type="text" inputmode="decimal" wire:model="price"
                    class="w-full rounded-lg border border-stone-300 bg-white px-3 py-2 text-sm text-stone-900 shadow-sm focus:border-amber-600 focus:outline-none focus:ring-1 focus:ring-amber-500" />
                @error('price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <span class="mb-2 block text-sm font-medium text-stone-700">Categories</span>
                <div
                    class="max-h-40 space-y-2 overflow-y-auto rounded-lg border border-stone-300 bg-white p-3 shadow-sm sm:max-w-md">
                    @foreach ($categories as $category)
                        <label class="flex items-center gap-2 text-sm text-stone-800"
                            wire:key="category-option-{{ $category->id }}">
                            <input type="checkbox" wire:model="categoryIds" value="{{ $category->id }}"
                                class="rounded border-stone-300 text-amber-800 focus:ring-amber-500" />
                            <span>{{ $category->name }}</span>
                        </label>
                    @endforeach
                </div>
                @error('categoryIds')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                @error('categoryIds.*')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex flex-wrap gap-2">
            <button type="submit"
                class="rounded-lg bg-stone-900 px-4 py-2 text-sm font-medium text-white hover:bg-stone-800">
                {{ $editingId !== null ? 'Update product' : 'Add product' }}
            </button>

            @if ($editingId !== null)
                <button type="button" wire:click="cancel"
                    class="rounded-lg border border-stone-300 bg-white/80 px-4 py-2 text-sm font-medium text-stone-700 hover:bg-stone-50">
                    Cancel
                </button>
            @endif
        </div>
    </form>

    <div class="overflow-hidden rounded-2xl border border-stone-200/80 bg-white/80 shadow-sm">
        <table class="min-w-full divide-y divide-stone-200 text-sm">
            <thead class="bg-stone-50/90">
                <tr>
                    <th scope="col" class="px-4 py-3 text-left font-medium text-stone-700">Name</th>
                    <th scope="col" class="px-4 py-3 text-left font-medium text-stone-700">Categories</th>
                    <th scope="col" class="px-4 py-3 text-right font-medium text-stone-700">Price</th>
                    <th scope="col" class="px-4 py-3 text-right font-medium text-stone-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-200">
                @forelse ($products as $product)
                    <tr wire:key="product-{{ $product->id }}">
                        <td class="px-4 py-3 text-stone-900">{{ $product->name }}</td>
                        <td class="px-4 py-3 text-stone-600">
                            {{ $product->categories->pluck('name')->join(', ') ?: '—' }}
                        </td>
                        <td class="px-4 py-3 text-right text-stone-900">{{ $product->price }}</td>
                        <td class="px-4 py-3 text-right">
                            <button type="button" wire:click="edit({{ $product->id }})"
                                class="mr-2 font-medium text-amber-900 hover:text-amber-950">
                                Edit
                            </button>
                            <button type="button" wire:click="delete({{ $product->id }})"
                                wire:confirm="Delete this product?" class="font-medium text-red-600 hover:text-red-800">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-stone-500">
                            No products yet. Add one above.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
