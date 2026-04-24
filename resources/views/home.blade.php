<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans min-h-screen bg-stone-100 text-stone-900 antialiased">
    <header class="relative z-10 border-b border-stone-200/80 bg-white/70 backdrop-blur">
        <div class="mx-auto flex max-w-5xl flex-wrap items-center justify-between gap-4 px-6 py-4">
            <a href="{{ route('home.index') }}"
                class="font-display text-lg font-semibold text-stone-900 hover:text-amber-950">
                Catalog
            </a>
            <nav class="flex flex-wrap gap-x-6 gap-y-2 text-sm font-medium text-stone-600">
                <a href="{{ route('products.index') }}" class="hover:text-amber-900">Shop</a>
                <a href="{{ route('admin.dashboard') }}" class="hover:text-amber-900">Admin</a>
            </nav>
        </div>
    </header>

    <main class="relative mx-auto max-w-3xl px-6 py-16 sm:py-24">
        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-amber-800/80">Laravel Livewire</p>
        <h1 class="font-display mt-3 text-4xl font-bold leading-tight text-stone-900 sm:text-5xl">
            Product catalog
        </h1>
        <p class="mt-4 max-w-xl text-base leading-relaxed text-stone-600">
            Browse products on the shop, filter by category, or open the admin to manage data.
        </p>

        <ul class="mt-12 grid gap-4 sm:grid-cols-2">
            <li>
                <a href="{{ route('products.index') }}"
                    class="group flex h-full flex-col rounded-2xl border border-stone-200/80 bg-white/80 p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-amber-300/60 hover:shadow-md">
                    <span class="text-xs font-semibold uppercase tracking-wider text-amber-800/90">Public</span>
                    <span class="font-display mt-2 text-lg font-semibold text-stone-900">Shop</span>
                    <span class="mt-2 flex-1 text-sm text-stone-600">List and filter products by category.</span>
                    <span class="mt-4 text-sm font-medium text-amber-900 group-hover:underline">Open shop →</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="group flex h-full flex-col rounded-2xl border border-stone-200/80 bg-white/80 p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-amber-300/60 hover:shadow-md">
                    <span class="text-xs font-semibold uppercase tracking-wider text-amber-800/90">Admin</span>
                    <span class="font-display mt-2 text-lg font-semibold text-stone-900">Dashboard</span>
                    <span class="mt-2 flex-1 text-sm text-stone-600">Manage products and categories.</span>
                    <span class="mt-4 text-sm font-medium text-amber-900 group-hover:underline">Open admin →</span>
                </a>
            </li>
        </ul>
    </main>
</body>

</html>
