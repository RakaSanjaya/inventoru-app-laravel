@extends('layouts.landingpage')

@section('title', 'About')

@section('content')


<section class="flex flex-col justify-center items-center mt-8 mb-12 px-5 md:px-10">
    <div class="mx-auto mb-12 py-2 px-6 rounded-tl-2xl rounded-br-2xl shadow-shadow-card bg-green-800 text-white w-fit">
        <h2 class="text-2xl font-bold text-center lg:text-xl">About Inventory App</h2>
    </div>
    <p class="text-neutral-600 text-sm text-center">Inventory App adalah platform digital yang dirancang untuk membantu pelaku usaha dalam mengelola stok barang secara efisien dan akurat. Kami menyediakan alat yang mudah digunakan untuk melacak inventaris, memantau penjualan, dan memprediksi kebutuhan stok. Dengan dukungan teknologi terbaru, Inventory App memungkinkan pengelolaan barang yang lebih efektif, sehingga bisnis Anda dapat berjalan dengan lebih lancar dan produktif. Bergabunglah dengan kami untuk mengoptimalkan manajemen inventaris Anda hari ini.</p>
    <a href="{{ route('login') }}"
        class="flex mx-auto lg:mx-0 items-center justify-between gap-2 font-semibold py-3 px-6 rounded-full bg-green-700 hover:bg-green-800 text-white w-fit text-sm mt-7">
        Login
    </a>
</section>

<section class="my-10 mx-5 lg:mx-10 lg:py-20">
    <div class="flex flex-col lg:flex-row gap-5 lg:gap-20 align-middle items-center">
        <div class="w-full lg:w-1/2">
            <h1 class="font-bold text-2xl">Our Vision</h1>
            <p class="text-sm text-neutral-600 ">
                Visi kami adalah menjadi platform terpercaya untuk pengelolaan inventaris di Indonesia, membantu bisnis dari berbagai skala untuk meningkatkan efisiensi dan akurasi dalam manajemen stok mereka. Dengan fitur-fitur inovatif, kami ingin menciptakan solusi manajemen inventaris yang dapat diakses oleh semua kalangan.
            </p>
            <h1 class="font-bold text-2xl text-end mt-5">Our Mission</h1>
            <p class="text-sm text-end text-neutral-600 ">
                Misi kami adalah menyediakan alat dan solusi yang memudahkan pengelolaan inventaris untuk bisnis. Dengan memanfaatkan teknologi terkini, kami berkomitmen untuk membantu bisnis meningkatkan produktivitas, mengurangi kesalahan, dan memastikan ketersediaan stok yang optimal.
            </p>
        </div>
        <div class="w-full lg:w-1/2 grid grid-cols-2 gap-4">
            <img src="/img/inventory-example.png" class="aspect-video" alt="" />
            <img src="/img/inventory-example.png" class="aspect-video" alt="" />
            <img src="/img/inventory-example.png" class="aspect-video" alt="" />
            <img src="/img/inventory-example.png" class="aspect-video" alt="" />
        </div>
    </div>
</section>

<section class="flex flex-col lg:flex-row h-screen justify-between items-center w-full px-4 lg:px-10 lg:my-20">
    <div class="flex flex-col gap-6">
        <div
            class="mx-auto mb-4 py-2 px-6 rounded-tl-2xl rounded-br-2xl shadow-shadow-card bg-green-800 text-white w-fit">
            <h2 class="text-2xl font-bold text-center lg:text-xl">Why Choose Us</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div
                class="p-6 rounded-2xl border-2 border-green-700 shadow-green-700 transition duration-300 shadow-shadow-card">
                <h1 class="font-bold text-lg">Akurasi Tinggi dengan <span class="text-green-700">Teknologi AI</span></h1>
                <p class="text-neutral-600 text-sm">
                    Inventory App menggunakan teknologi AI canggih untuk memantau stok barang secara real-time, mengurangi kemungkinan kesalahan manusia, dan memberikan prediksi kebutuhan stok secara akurat.
                </p>
            </div>
            <div
                class="p-6 rounded-2xl border-2 border-green-700 shadow-green-700 transition duration-300 shadow-shadow-card">
                <h1 class="font-bold text-lg">Mudah Diintegrasikan<span class="text-green-700"> ke Sistem Lain</span></h1>
                <p class="text-neutral-600 text-sm">
                    Solusi kami dirancang agar mudah diintegrasikan dengan perangkat lunak lain seperti POS (Point of Sale) dan ERP (Enterprise Resource Planning) untuk pengalaman yang lebih seamless.
                </p>
            </div>
            <div
                class="p-6 rounded-2xl border-2 border-green-700 shadow-green-700 transition duration-300 shadow-shadow-card">
                <h1 class="font-bold text-lg">Gratis dan <span class="text-green-700">Mudah Digunakan</span></h1>
                <p class="text-neutral-600 text-sm">
                    Inventory App menyediakan opsi gratis untuk pengguna, lengkap dengan antarmuka yang user-friendly, sehingga dapat digunakan oleh siapa saja tanpa pelatihan khusus.
                </p>
            </div>
            <div
                class="p-6 rounded-2xl border-2 border-green-700 shadow-green-700 transition duration-300 shadow-shadow-card">
                <h1 class="font-bold text-lg">Keamanan Data yang<span class="text-green-700"> Terjamin</span></h1>
                <p class="text-neutral-600 text-sm">
                    Kami memahami pentingnya data bisnis Anda. Oleh karena itu, kami menggunakan protokol keamanan tingkat tinggi untuk melindungi semua data inventaris Anda.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection