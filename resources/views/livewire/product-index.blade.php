<div class="mx-auto max-w-3xl space-y-6 p-6">
    <h1 class="font-display text-2xl font-semibold text-stone-900">Products</h1>

    <div>
        <label for="category" class="mb-1 block text-sm font-medium text-stone-700">Category</label>
        <select id="category" wire:model.live="categoryId"
            class="w-full rounded-lg border border-stone-300 bg-white px-3 py-2 text-sm text-stone-900 shadow-sm focus:border-amber-600 focus:outline-none focus:ring-1 focus:ring-amber-500">
            <option value="">All categories</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <ul class="divide-y divide-stone-200 overflow-hidden rounded-2xl border border-stone-200/80 bg-white/80 shadow-sm">
        @forelse ($products as $product)
            <li class="flex flex-col gap-1 px-4 py-3" wire:key="product-{{ $product->id }}">
                <span class="font-medium text-stone-900">{{ $product->name }}</span>
                <span class="text-sm text-stone-600">{{ $product->categories->pluck('name')->join(', ') ?: '—' }}</span>
                <span class="text-sm text-stone-800">{{ $product->price }} SEK</span>
            </li>
        @empty
            <li class="px-4 py-6 text-sm text-stone-500">No products match this filter.</li>
        @endforelse
    </ul>
</div>
