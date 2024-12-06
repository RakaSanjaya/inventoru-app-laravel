<section class="fixed h-screen mt-20 w-1/5 bg-white shadow-md z-20">
    <div class="flex flex-col">
        <x-sidebar.link href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'text-white bg-emerald-700' : 'text-neutral-400' }} border-b border-neutral-200 w-full h-full block px-4 py-5 duration-200 ease-in text-sm hover:text-white hover:bg-neutral-400">
            <p>Dashboard</p>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="{{ request()->routeIs('dashboard') ? 'currentColor' : 'none' }}" stroke="{{ request()->routeIs('dashboard') ? 'none' : 'currentColor' }}" stroke-width="1.5" class="size-6">
                <path fill-rule="evenodd" d="M3 6a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3V6ZM3 15.75a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-2.25Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3v-2.25Z" clip-rule="evenodd" />
            </svg>
        </x-sidebar.link>

        <x-sidebar.link href="{{ route('products.index') }}" class="{{ request()->routeIs('products.index') || request()->routeIs('products.create') || request()->routeIs('products.edit') || request()->routeIs('products.adjustStockForm') || request()->routeIs('products.show') ? 'text-white bg-emerald-700' : 'text-neutral-400' }} border-b border-neutral-200 w-full h-full block px-4 py-5 duration-200 ease-in text-sm hover:text-white hover:bg-neutral-400">
            <p>Products</p>
            <!-- Ikon Products -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="{{ request()->routeIs('products.index') ? 'currentColor' : 'none' }}" stroke="{{ request()->routeIs('products.index') ? 'none' : 'currentColor' }}" stroke-width="1.5" class="size-6">
                <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                <path fill-rule="evenodd" d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.163 3.75A.75.75 0 0 1 10 12h4a.75.75 0 0 1 0 1.5h-4a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
            </svg>
        </x-sidebar.link>


        @if(auth()->user()->role !== 'user')
        <x-sidebar.link href="{{ route('accounts.index') }}"
            class="{{ request()->routeIs('accounts.index') || request()->routeIs('accounts.create') || request()->routeIs('accounts.edit') || request()->routeIs('accounts.adjustStockForm') || request()->routeIs('accounts.show') ? 'text-white bg-emerald-700' : 'text-neutral-400' }} border-b border-neutral-200 w-full h-full block px-4 py-5 duration-200 ease-in text-sm hover:text-white hover:bg-neutral-400">
            <p>Accounts</p>
            <!-- Ikon Accounts -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="{{ request()->routeIs('accounts.index') || request()->routeIs('accounts.create') || request()->routeIs('accounts.edit') || request()->routeIs('accounts.adjustStockForm') ? 'currentColor' : 'none' }}" stroke="{{ request()->routeIs('accounts.index') || request()->routeIs('accounts.create') || request()->routeIs('accounts.edit') || request()->routeIs('accounts.adjustStockForm') ? 'none' : 'currentColor' }}" stroke-width="1.7" class="size-6">
                <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z" clip-rule="evenodd" />
                <path d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
            </svg>
        </x-sidebar.link>

        @endif
        <x-sidebar.link href="{{ route('history.index') }}"
            class="{{ request()->routeIs('history.index') || request()->routeIs('history.edit') || request()->routeIs('history.create') || request()->routeIs('history.show') ? 'text-white bg-emerald-700' : 'text-neutral-400' }} border-b border-neutral-200 w-full h-full block px-4 py-5 duration-200 ease-in text-sm hover:text-white hover:bg-neutral-400">
            <p>History Activity</p>
            <!-- Ikon saat link aktif -->
            @if(request()->routeIs('history.index') || request()->routeIs('history.edit'))
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M4.125 3C3.089 3 2.25 3.84 2.25 4.875V18a3 3 0 0 0 3 3h15a3 3 0 0 1-3-3V4.875C17.25 3.839 16.41 3 15.375 3H4.125ZM12 9.75a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H12Zm-.75-2.25a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 0 1.5H12a.75.75 0 0 1-.75-.75ZM6 12.75a.75.75 0 0 0 0 1.5h7.5a.75.75 0 0 0 0-1.5H6Zm-.75 3.75a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5H6a.75.75 0 0 1-.75-.75ZM6 6.75a.75.75 0 0 0-.75.75v3c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-3A.75.75 0 0 0 9 6.75H6Z" clip-rule="evenodd" />
                <path d="M18.75 6.75h1.875c.621 0 1.125.504 1.125 1.125V18a1.5 1.5 0 0 1-3 0V6.75Z" />
            </svg>

            @else
            <!-- Ikon saat link non-aktif -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
            </svg>
            @endif
        </x-sidebar.link>

        <x-sidebar.link href="{{ route('categories.index') }}"
            class="{{ request()->routeIs('categories.index') || request()->routeIs('categories.create') || request()->routeIs('categories.edit') ? 'text-white bg-emerald-700' : 'text-neutral-400' }} border-b border-neutral-200 w-full h-full block px-4 py-5 duration-200 ease-in text-sm hover:text-white hover:bg-neutral-400">
            <p>Manage Categories</p>
            <!-- Tampilkan ikon aktif jika route cocok -->
            @if (request()->routeIs('categories.index') || request()->routeIs('categories.create'))
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="size-6">
                <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375ZM6 12a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V12Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 15a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V15Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 18a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V18Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
            </svg>
            @else
            <!-- Tampilkan ikon non-aktif jika route tidak cocok -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
            </svg>
            @endif
        </x-sidebar.link>

        <x-sidebar.link href="{{ route('locations.index') }}"
            class="{{ request()->routeIs('locations.index') || request()->routeIs('locations.create') || request()->routeIs('locations.edit') ? 'text-white bg-emerald-700' : 'text-neutral-400' }} border-b border-neutral-200 w-full h-full block px-4 py-5 duration-200 ease-in text-sm hover:text-white hover:bg-neutral-400">
            <p>Storage Locations</p>
            <!-- Change icon based on route status -->
            @if (request()->routeIs('locations.index') || request()->routeIs('locations.create'))
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M1.5 9.832v1.793c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875V9.832a3 3 0 0 0-.722-1.952l-3.285-3.832A3 3 0 0 0 16.215 3h-8.43a3 3 0 0 0-2.278 1.048L2.222 7.88A3 3 0 0 0 1.5 9.832ZM7.785 4.5a1.5 1.5 0 0 0-1.139.524L3.881 8.25h3.165a3 3 0 0 1 2.496 1.336l.164.246a1.5 1.5 0 0 0 1.248.668h2.092a1.5 1.5 0 0 0 1.248-.668l.164-.246a3 3 0 0 1 2.496-1.336h3.165l-2.765-3.226a1.5 1.5 0 0 0-1.139-.524h-8.43Z" clip-rule="evenodd" />
                <path d="M2.813 15c-.725 0-1.313.588-1.313 1.313V18a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-1.688c0-.724-.588-1.312-1.313-1.312h-4.233a3 3 0 0 0-2.496 1.336l-.164.246a1.5 1.5 0 0 1-1.248.668h-2.092a1.5 1.5 0 0 1-1.248-.668l-.164-.246A3 3 0 0 0 7.046 15H2.812Z" />
            </svg>
            @else
            <!-- Non-active icon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m7.875 14.25 1.214 1.942a2.25 2.25 0 0 0 1.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 0 1 1.872 1.002l.164.246a2.25 2.25 0 0 0 1.872 1.002h2.092a2.25 2.25 0 0 0 1.872-1.002l.164-.246A2.25 2.25 0 0 1 16.954 9h4.636M2.41 9a2.25 2.25 0 0 0-.16.832V12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 0 1 .382-.632l3.285-3.832a2.25 2.25 0 0 1 1.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0 0 21.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 0 0 2.25 2.25Z" />
            </svg>
            @endif
        </x-sidebar.link>

        <x-sidebar.link href="{{ route('profile.index') }}"
            class="{{ request()->routeIs('profile.index') || request()->routeIs('profile.edit') ? 'text-white bg-emerald-700' : 'text-neutral-400' }} border-b border-neutral-200 w-full h-full block px-4 py-5 duration-200 ease-in text-sm hover:text-white hover:bg-neutral-400">
            <p>Profile</p>
            <!-- Change icon based on route status -->
            @if (request()->routeIs('profile.index') || request()->routeIs('profile.edit'))
            <!-- Active icon -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
            </svg>
            @else
            <!-- Inactive icon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
            @endif
        </x-sidebar.link>

    </div>
</section>