<section class="fixed h-screen mt-20 w-1/5 bg-white shadow-md">
    <div class="flex flex-col">
        <x-sidebar.link href="{{ route('dashboard') }}">Dashboard</x-sidebar.link>
        <x-sidebar.link href="{{ route('products.index') }}">Products</x-sidebar.link>
        <x-sidebar.link href="{{ route('history.index') }}">History Activity</x-sidebar.link>
        <x-sidebar.link href="{{ route('categories.index') }}">Manage Categories</x-sidebar.link>
        <x-sidebar.link href="{{ route('notifications.index') }}">Notifications</x-sidebar.link>
        <x-sidebar.link href="{{ route('locations.index') }}">Storage Locations</x-sidebar.link>
        <x-sidebar.link href="{{ route('profile.index') }}">Profile</x-sidebar.link>
    </div>
</section>