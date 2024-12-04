<section class="fixed h-screen mt-20 w-1/5 bg-white shadow-md z-20">
    <div class="flex flex-col">
        <x-sidebar.link href="{{ route('dashboard') }}">Dashboard</x-sidebar.link>
        <x-sidebar.link href="{{ route('products.index') }}"
            class="{{ request()->routeIs('products.index') || request()->routeIs('products.create') || request()->routeIs('products.edit') || request()->routeIs('products.adjustStockForm') ? 'text-white bg-emerald-800' : 'text-neutral-400' }} border-b border-neutral-200 w-full h-full block px-4 py-5 duration-200 ease-in text-sm hover:text-white hover:bg-neutral-400">
            Products
        </x-sidebar.link>
        <x-sidebar.link href="{{ route('accounts.index') }}"
            class="{{ request()->routeIs('accounts.index') || request()->routeIs('accounts.create') || request()->routeIs('accounts.edit') || request()->routeIs('accounts.adjustStockForm') ? 'text-white bg-emerald-800' : 'text-neutral-400' }} border-b border-neutral-200 w-full h-full block px-4 py-5 duration-200 ease-in text-sm hover:text-white hover:bg-neutral-400">
            accounts
        </x-sidebar.link>
        <x-sidebar.link href="{{ route('history.index') }}">History Activity</x-sidebar.link>
        <x-sidebar.link href="{{ route('categories.index') }}"
            class="{{ request()->routeIs('categories.index') || request()->routeIs('categories.create') ? 'text-white bg-emerald-800' : 'text-neutral-400' }} border-b border-neutral-200 w-full h-full block px-4 py-5 duration-200 ease-in text-sm hover:text-white hover:bg-neutral-400">
            Manage Categories
        </x-sidebar.link>
        <x-sidebar.link href="{{ route('locations.index') }}"
            class="{{ request()->routeIs('locations.index') || request()->routeIs('locations.create') ? 'text-white bg-emerald-800' : 'text-neutral-400' }} border-b border-neutral-200 w-full h-full block px-4 py-5 duration-200 ease-in text-sm hover:text-white hover:bg-neutral-400">
            Storage Locations
        </x-sidebar.link>
        <x-sidebar.link href="{{ route('profile.index') }}">Profile</x-sidebar.link>
    </div>
</section>