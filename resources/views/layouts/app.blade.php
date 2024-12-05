<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>
        @isset($title)
        {{ $title }} | Inventory App
        @else
        App
        @endisset
    </title>
</head>

<body class="bg-gray-100 font-inter leading-normal tracking-normal text-sm">
    <x-navbar.index></x-navbar.index>
    <div class="flex min-h-screen">
        <x-sidebar></x-sidebar>
        <section class="container ml-[20%] px-4 mx-auto mt-20">
            @yield('content')
        </section>
    </div>
    @yield('scripts')
</body>

</html>