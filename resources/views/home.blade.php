@extends('layouts.landingpage')

@section('title', 'Home')

@section('content')
<section class="flex lg:justify-between items-center justify-center w-full min-h-screen px-4 lg:px-10 flex-col gap-10 lg:flex-row-reverse lg:my-20">
    <div class="lg:w-1/2 lg:mx-auto">
        <img src="./img/inventory.jpg" class="w-12/12 mx-auto" alt="img-inventory" />
    </div>
    <div class="flex flex-col lg:w-1/2 lg:mx-auto gap-3 text-center lg:text-left">
        <h1 class="text-2xl lg:text-6xl font-bold">
            Kelola Stok Lebih
            <span class="text-green">Mudah, Akurat, dan Efisien </span>
        </h1>
        <p class="text-neutral-600 text-sm">
            Website inventory barang adalah platform digital untuk mencatat, melacak, dan mengelola stok secara real-time,
            dilengkapi fitur notifikasi, laporan, dan dashboard interaktif guna meningkatkan efisiensi operasional.
        </p>
        <a
            href="kalkulator"
            class="flex mx-auto lg:mx-0 items-center justify-between gap-2 font-semibold py-3 mt-2 px-6 rounded-full bg-green hover:bg-green text-white w-fit text-sm">
            lihat selengkapnya
            <img src="./icon/arrow.svg" class="mr-0" alt="calculator" />
        </a>
    </div>
</section>

<section class="flex flex-col lg:flex-row justify-between items-center w-full px-4 lg:px-10 lg:my-20">
    <div class="flex flex-col gap-6">
        <div class="mx-auto mb-4 py-2 px-6 rounded-tl-2xl rounded-br-2xl shadow-shadow-card bg-green text-white w-fit">
            <h2 class="text-2xl font-bold text-center lg:text-xl">Mengapa harus menggunakan App Inventory?</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="p-6 rounded-2xl border-2 border-green shadow-green transition duration-300 shadow-shadow-card">
                <h1 class="font-bold text-lg"></span>Pengelolaan Stok <span class="text-green">Lebih Akurat</h1></span>
                <p class="text-neutral-600 text-sm">
                    Aplikasi inventory memungkinkan Anda untuk memantau jumlah stok barang secara real-time.
                    Hal ini penting agar Anda selalu mengetahui persediaan barang yang ada dan bisa menghindari kekurangan atau kelebihan stok.
                </p>
            </div>
            <div class="p-6 rounded-2xl border-2 border-green shadow-green transition duration-300 shadow-shadow-card">
                <h1 class="font-bold text-lg"></span>Meningkatkan <span class="text-green">Efisiensi Operasional</h1></span>
                <p class="text-neutral-600 text-sm">
                    Aplikasi inventory dapat mengotomatiskan berbagai proses yang biasanya dilakukan secara manual, seperti pencatatan barang masuk dan keluar, pengecekan stok, dan pembuatan laporan.
                    Dengan demikian, waktu dan tenaga yang sebelumnya digunakan untuk tugas-tugas tersebut dapat dialihkan ke aktivitas yang lebih strategis.
                </p>
            </div>
            <div class="p-6 rounded-2xl border-2 border-green shadow-green transition duration-300 shadow-shadow-card">
                <h1 class="font-bold text-lg"></span>Notifikasi <span class="text-green">Stok Barang</h1></span>
                <p class="text-neutral-600 text-sm">
                    Aplikasi inventory sering dilengkapi dengan fitur pemberitahuan atau peringatan otomatis ketika stok barang mendekati batas minimum yang ditentukan.
                    Fitur ini membantu Anda untuk lebih siap melakukan pemesanan ulang dan menghindari kekurangan stok yang dapat mengganggu kelancaran operasional atau layanan pelanggan.
                </p>
            </div>
            <div class="p-6 rounded-2xl border-2 border-green shadow-green transition duration-300 shadow-shadow-card">
                <h1 class="font-bold text-lg"></span>Meningkatkan <span class="text-green">Transparansi dan Kontrol</h1></span>
                <p class="text-neutral-600 text-sm">
                    Aplikasi inventory memberikan kontrol penuh atas stok barang yang ada. Dengan kontrol akses yang dapat disesuaikan untuk setiap pengguna, Anda bisa memastikan bahwa hanya orang yang berwenang yang dapat mengubah atau mengakses informasi tertentu.
                    Hal ini meningkatkan transparansi dalam pengelolaan inventaris dan meminimalkan potensi kecurangan atau penyalahgunaan data.
            </div>
        </div>
    </div>
</section>


<section class="w-full px-4 lg:px-10 my-10">
    <div class="mx-auto py-2 px-6 rounded-tl-2xl rounded-br-2xl shadow-shadow-card bg-green text-white w-fit mb-10">
        <h2 class="text-2xl font-bold text-center lg:text-xl">fitur utama yang dapat Anda temukan</h2>
    </div>
    <div class="flex flex-col-reverse lg:flex-row-reverse align-middle items-center justify-between">
        <div class="w-full lg:w-1/2">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col border w-full border-green p-6 rounded-2xl">
                    <img src="./icon/home.svg" alt="" class="w-10" />
                    <h1 class="font-bold text-lg mt-5">Dashboard <span class="text-green">Interaktif</span></h1>
                    <p class="text-neutral-600 text-sm">
                        Menampilkan data penting seperti jumlah barang masuk dan keluar, sisa stok, dan status kategori barang dalam grafik yang mudah dipahami.
                    </p>
                </div>
                <div class="flex flex-col border border-green p-6 rounded-2xl">
                    <img src="./icon/navigation.svg" alt="" class="w-10" />
                    <h1 class="font-bold text-lg mt-5">Navigasi <span class="text-green">Cepat</span></h1>
                    <p class="text-neutral-600 text-sm">Akses langsung ke menu utama seperti Tambah Barang, Kelola Stok, dan Laporan hanya dengan satu klik.
                    </p>
                </div>
                <div class="flex flex-col border border-green p-6 rounded-2xl">
                    <img src="./icon/notification.svg" alt="" class="w-10" />
                    <h1 class="font-bold text-lg mt-5"><span class="text-green">Notifikasi</span> Penting</h1>
                    <p class="text-neutral-600 text-sm">Peringatan barang yang perlu restock atau yang mendekati tanggal kedaluwarsa untuk menjaga ketersediaan stok.</p>
                </div>
                <div class="flex flex-col border border-green p-6 rounded-2xl">
                    <img src="./icon/history.svg" alt="" class="w-10" />
                    <h1 class="font-bold text-lg mt-5">History <span class="text-green">Aktivitas Terbaru</span></h1>
                    <p class="text-neutral-600 text-sm">
                        Daftar transaksi atau perubahan stok terakhir untuk mempermudah pemantauan aktivitas harian.</p>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/2">
            <img src="./img/inventory-worker.png" alt="" class="w-8/12 mx-auto" />
        </div>
    </div>
</section>

<section class="w-full bg-white py-20">
    <div class="mx-auto flex flex-col items-center gap-6 w-full px-4 lg:px-10">
        <h2 class="text-2xl font-bold text-center"><span class="text-green">FAQ</span> - Frequently Asked Questions</h2>
        <div class="w-full space-y-2">
            <div class="border border-gray-200 rounded-lg w-full">
                <button class="w-full flex justify-between items-center p-4 text-left text-gray-800 font-semibold" id="faq1-btn">
                    Apa itu sistem inventory barang?
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="faq1-content" class="hidden px-4 py-2 text-gray-600">
                    Sistem inventory barang adalah sebuah aplikasi atau platform yang digunakan untuk memantau, mengelola, dan mengatur persediaan barang dalam suatu organisasi atau perusahaan.
                    Sistem ini membantu memastikan barang tersedia dengan cukup dan terkelola dengan baik.
                </div>
            </div>

            <div class="border border-gray-200 rounded-lg w-full">
                <button class="w-full flex justify-between items-center p-4 text-left text-gray-800 font-semibold" id="faq2-btn">
                    Apa keunggulan utama dari sistem inventory barang ini?
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="faq2-content" class="hidden px-4 py-2 text-gray-600">
                    Sistem inventory barang kami memiliki keunggulan utama seperti pengelolaan persediaan secara real-time, kemudahan akses melalui berbagai perangkat,
                    pemberitahuan otomatis saat stok rendah, dan laporan terperinci.
                </div>
            </div>

            <div class="border border-gray-200 rounded-lg w-full">
                <button class="w-full flex justify-between items-center p-4 text-left text-gray-800 font-semibold" id="faq3-btn">
                    Apakah saya bisa mengakses sistem dari perangkat lain?
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="faq3-content" class="hidden px-4 py-2 text-gray-600">
                    Ya, sistem ini dapat diakses dari berbagai perangkat yang terhubung ke internet, seperti laptop, komputer, atau ponsel pintar.
                    Cukup masuk dengan akun Anda untuk mengelola inventory barang di mana saja.
                </div>
            </div>

            <div class="border border-gray-200 rounded-lg w-full">
                <button class="w-full flex justify-between items-center p-4 text-left text-gray-800 font-semibold" id="faq4-btn">
                    Bagaimana cara sistem ini membantu menghemat waktu dan tenaga?
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="faq4-content" class="hidden px-4 py-2 text-gray-600">
                    Sistem ini menghemat waktu dan tenaga dengan mengotomatiskan pencatatan barang, pemantauan stok, dan pembuatan laporan,
                    sehingga mengurangi tugas manual dan mengurangi kemungkinan kesalahan manusia.
                </div>
            </div>
        </div>
    </div>
</section>
@endsection