<nav class="bg-white shadow-md fixed w-full">
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
                <x-navbar.link href="{{ route('notifications.index') }}">Notification</x-navbar.link>
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