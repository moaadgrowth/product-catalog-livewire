<div class="mx-auto max-w-3xl space-y-6 p-6">
    <h1 class="text-xl font-semibold">Products</h1>

    <div>
        <label for="category" class="mb-1 block text-sm font-medium">Category</label>
        <select id="category" wire:model.live="categoryId"
            class="w-full rounded border border-gray-300 bg-white px-3 py-2 text-sm">
            <option value="">All categories</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <ul class="divide-y divide-gray-200 rounded border border-gray-200">
        @forelse ($products as $product)
            <li class="flex flex-col gap-1 px-4 py-3" wire:key="product-{{ $product->id }}">
                <span class="font-medium">{{ $product->name }}</span>
                <span class="text-sm text-gray-600">{{ $product->categories->pluck('name')->join(', ') ?: '—' }}</span>
                <span class="text-sm">{{ $product->price }} SEK</span>
            </li>
        @empty
            <li class="px-4 py-6 text-sm text-gray-500">No products match this filter.</li>
        @endforelse
    </ul>
</div>
