<div class="mx-auto max-w-3xl space-y-8 p-6">
    <div class="flex items-center justify-between gap-4">
        <h1 class="text-xl font-semibold">Categories</h1>
        <a href="{{ route('products.index') }}" class="text-sm text-gray-600 underline hover:text-gray-900">
            View shop
        </a>
    </div>

    <form wire:submit="save" class="space-y-4 rounded border border-gray-200 bg-white p-4 shadow-sm">
        <div>
            <label for="category-name" class="mb-1 block text-sm font-medium text-gray-700">
                Name
            </label>
            <input id="category-name" type="text" wire:model="name"
                class="w-full rounded border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500"
                autocomplete="off" />
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-wrap gap-2">
            <button type="submit"
                class="rounded bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-800">
                {{ $editingId ? 'Update category' : 'Add category' }}
            </button>

            @if ($editingId)
                <button type="button" wire:click="cancel"
                    class="rounded border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Cancel
                </button>
            @endif
        </div>
    </form>

    <div class="overflow-hidden rounded border border-gray-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr >
                    <th scope="col" class="px-4 py-3 text-left font-medium text-gray-700">Name</th>
                    <th scope="col" class="px-4 py-3 text-right font-medium text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($categories as $category)
                    <tr wire:key="category-{{ $category->id }}">
                        <td class="px-4 py-3 text-gray-900">{{ $category->name }}</td>
                        <td class="px-4 py-3 text-right">
                            <button type="button" wire:click="edit({{ $category->id }})"
                                class="mr-2 text-indigo-600 hover:text-indigo-800">
                                Edit
                            </button>
                            <button type="button" wire:click="delete({{ $category->id }})"
                                wire:confirm="Delete this category? Products will be unlinked from it."
                                class="text-red-600 hover:text-red-800">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-4 py-6 text-center text-gray-500">
                            No categories yet. Add one above.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
