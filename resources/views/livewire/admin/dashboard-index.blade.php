<div class="mx-auto max-w-3xl space-y-8 p-6">
    <div>
        <h1 class="font-display text-2xl font-semibold text-stone-900">Dashboard</h1>
        <p class="mt-2 text-sm text-stone-600">
            Manage products and categories for the catalog.
        </p>
    </div>

    <ul class="grid gap-4 sm:grid-cols-2">
        <li>
            <a href="{{ route('admin.products.index') }}"
                class="group flex h-full flex-col rounded-2xl border border-stone-200/80 bg-white/80 p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-amber-300/60 hover:shadow-md">
                <span class="text-xs font-semibold uppercase tracking-wider text-amber-800/90">Admin</span>
                <span class="font-display mt-2 text-lg font-semibold text-stone-900">Products</span>
                <span class="mt-2 flex-1 text-sm text-stone-600">Create, edit, prices, and category assignments.</span>
                <span class="mt-4 text-sm font-medium text-amber-900 group-hover:underline">Open products →</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.categories.index') }}"
                class="group flex h-full flex-col rounded-2xl border border-stone-200/80 bg-white/80 p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-amber-300/60 hover:shadow-md">
                <span class="text-xs font-semibold uppercase tracking-wider text-amber-800/90">Admin</span>
                <span class="font-display mt-2 text-lg font-semibold text-stone-900">Categories</span>
                <span class="mt-2 flex-1 text-sm text-stone-600">Add, rename, or remove categories.</span>
                <span class="mt-4 text-sm font-medium text-amber-900 group-hover:underline">Open categories →</span>
            </a>
        </li>
    </ul>
</div>
