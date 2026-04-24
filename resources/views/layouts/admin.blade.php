<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="font-sans min-h-screen bg-stone-100 text-stone-900 antialiased">
    <header class="relative z-10 border-b border-stone-200/80 bg-white/70 backdrop-blur">
        <div class="mx-auto flex max-w-5xl flex-wrap items-center justify-between gap-4 px-6 py-4">
            <a href="{{ route('admin.dashboard') }}"
                class="font-display text-lg font-semibold text-stone-900 hover:text-amber-950">
                Admin
            </a>
            <nav class="flex flex-wrap gap-x-6 gap-y-2 text-sm font-medium text-stone-600">
                <a href="{{ route('admin.products.index') }}" class="hover:text-amber-900">Products</a>
                <a href="{{ route('admin.categories.index') }}" class="hover:text-amber-900">Categories</a>
                <a href="{{ route('products.index') }}" class="hover:text-amber-900">View shop</a>
            </nav>
        </div>
    </header>

    <div class="relative z-10">
        {{ $slot }}
    </div>

    @livewireScripts
</body>

</html>
