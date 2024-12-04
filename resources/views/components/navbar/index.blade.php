<nav class="bg-white shadow-md fixed w-full z-10">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between">
            <h1 class="text-lg font-bold"><span class="text-emerald-800">Inventory</span> App</h1>
            <div class="flex gap-x-5 items-center align-middle justify-between">
                @guest
                <x-navbar.link href="{{ route('home') }}">Home</x-navbar.link>
                <x-navbar.link href="{{ route('about') }}">About</x-navbar.link>
                <x-navbar.link href="{{ route('contact') }}">Contact</x-navbar.link>
                <a href="{{ route('login') }}" class="text-sm font-bold leading-6 text-emerald-800">Log in</a>
                @else
                <x-navbar.link href="{{ route('notifications.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                    </svg>

                </x-navbar.link>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm font-bold leading-6 text-red-800">
                        Logout
                    </button>
                </form>
                @endguest
            </div>
        </div>
    </div>
</nav>