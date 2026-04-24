<div class="mx-auto max-w-3xl space-y-8 p-6">
    <h1 class="font-display text-2xl font-semibold text-stone-900">Categories</h1>

    <form wire:submit="save" class="space-y-4 rounded-2xl border border-stone-200/80 bg-white/80 p-5 shadow-sm">
        <div>
            <label for="category-name" class="mb-1 block text-sm font-medium text-stone-700">
                Name
            </label>
            <input id="category-name" type="text" wire:model="name"
                class="w-full rounded-lg border border-stone-300 bg-white px-3 py-2 text-sm text-stone-900 shadow-sm focus:border-amber-600 focus:outline-none focus:ring-1 focus:ring-amber-500"
                autocomplete="off" />
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-wrap gap-2">
            <button type="submit"
                class="rounded-lg bg-stone-900 px-4 py-2 text-sm font-medium text-white hover:bg-stone-800">
                {{ $editingId ? 'Update category' : 'Add category' }}
            </button>

            @if ($editingId)
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
                    <th scope="col" class="px-4 py-3 text-right font-medium text-stone-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-200">
                @forelse ($categories as $category)
                    <tr wire:key="category-{{ $category->id }}">
                        <td class="px-4 py-3 text-stone-900">{{ $category->name }}</td>
                        <td class="px-4 py-3 text-right">
                            <button type="button" wire:click="edit({{ $category->id }})"
                                class="mr-2 font-medium text-amber-900 hover:text-amber-950">
                                Edit
                            </button>
                            <button type="button" wire:click="delete({{ $category->id }})"
                                wire:confirm="Delete this category? Products will be unlinked from it."
                                class="font-medium text-red-600 hover:text-red-800">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-4 py-6 text-center text-stone-500">
                            No categories yet. Add one above.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
