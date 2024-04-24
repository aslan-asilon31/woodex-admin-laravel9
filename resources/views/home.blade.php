@extends('layouts.app')
@section('content')
    {{-- hero --}}
    <section class="bg-light dark:bg-dark pt-10">
        <div class="container">
            <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
                <div class="mr-auto place-self-center lg:col-span-7">
                    <h1
                        class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                        Percayakan furnitur dan dekorasi rumah anda kepada kami</h1>
                    <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Jasa
                        pembuatan furnitur dan dekorasi rumah kustom sesuai keinginan anda</p>
                    <a href="#"
                        class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white dark:text-gray-800 rounded-lg bg-four dark:bg-first">
                        Belanja Sekarang
                        <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
                <div class="lg:mt-0 lg:col-span-5 lg:flex">
                    <img src="img/hero/hero.png" alt="mockup">
                </div>
            </div>
        </div>
    </section>
    {{-- akhir hero --}}
    {{-- mengapa --}}
    <section class="bg-light dark:bg-dark">
        <div class="container">
            <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
                <div class="font-light text-gray-500 sm:text-lg">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Mengapa memilih
                        kami
                        ?
                    </h2>
                    <p class="mb-4 text-justify">Terdapat website yang menyediakan katalog produk beserta pemesanan secara
                        online sehingga lebih efektif dalam membeli.</p>
                </div>
                <div class="grid grid-cols-2 gap-4 mt-8">
                    <div
                        class="w-full max-w-sm bg-third transition hover:-translate-y-3 duration-300 delay-150 shadow-xl hover:shadow-amber-500/50 border border-gray-200 rounded dark:border-gray-700">
                        <div class="flex flex-col items-center py-4 px-4">
                            <img class="w-24 h-24 mb-3" src="img/mengapa/bagus.png" alt="gambar icon berkualitas" />
                            <h5 class="mb-1 text-xl font-medium text-white">Berkualitas</h5>
                        </div>
                    </div>
                    <div
                        class="w-full max-w-sm bg-third transition hover:-translate-y-3 duration-300 delay-150 shadow-xl hover:shadow-amber-500/50 border border-gray-200 rounded-lg dark:border-gray-700">
                        <div class="flex flex-col items-center py-4 px-4">
                            <img class="w-24 h-24 mb-3" src="img/mengapa/rapi.png" alt="gambar icon rapi" />
                            <h5 class="mb-1 text-xl font-medium text-white">Rapi</h5>
                        </div>
                    </div>
                    <div
                        class="w-full max-w-sm bg-third transition hover:-translate-y-3 duration-300 delay-150 shadow-xl hover:shadow-amber-500/50 border border-gray-200 rounded-lg dark:border-gray-700">
                        <div class="flex flex-col items-center py-4 px-4">
                            <img class="w-24 h-24 mb-3" src="img/mengapa/trend.png" alt="gambar icon trend" />
                            <h5 class="mb-1 text-xl font-medium text-white">Model terkini</h5>
                        </div>
                    </div>
                    <div
                        class="w-full max-w-sm bg-third transition hover:-translate-y-3 duration-300 delay-150 shadow-xl hover:shadow-amber-500/50 border border-gray-200 rounded-lg dark:border-gray-700">
                        <div class="flex flex-col items-center py-4 px-4">
                            <img class="w-24 h-24 mb-3" src="img/mengapa/tahan.png" alt="gambar icon cepat" />
                            <h5 class="mb-1 text-xl font-medium text-white">Tahan Lama</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- akhir mengapa --}}
    {{-- layanan --}}
    <section class="bg-light dark:bg-dark pt-24">
        <div class="py-8 px-4 mx-auto text-center max-w-screen-xl sm:py-16 lg:px-20">
            <div class="mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Layanan Kami</h2>
            </div>
            <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                <div>
                    <div
                        class="flex mx-auto justify-center items-center mb-4 w-10 h-10 rounded-full bg-five dark:bg-third lg:h-12 lg:w-12">
                        <img class="w-5 h-5 mx-auto lg:w-6 lg:h-6" src="img/layanan/custom.png" />
                    </div>
                    <h3 class="mb-2 text-2xl font-bold dark:text-white">Kustom</h3>
                    <p class="text-gray-500 text-justify">Furnitur dan dekorasi rumah dapat dipesan secara kustom untuk
                        ukurannya berdasarkan
                        katalog atau jika mempunyai referensi desain sendiri dapat mengunggah desain yang diinginkan pada
                        menu kustom</p>
                </div>
                {{-- <div>
                    <div
                        class="flex mx-auto justify-center items-center mb-4 w-10 h-10 rounded-full bg-amber-600 lg:h-12 lg:w-12">
                        <img class="w-5 h-5 mx-auto lg:w-6 lg:h-6" src="img/layanan/length.png" />
                    </div>
                    <h3 class="mb-2 text-2xl font-bold dark:text-white">Pengukuran</h3>
                    <p class="text-gray-500 text-justify">Dalam wilayah kota Purwokerto dapat dilakukan pengukuran secara
                        langsung untuk furnitur tertentu</p>
                </div> --}}
                <div>
                    <div
                        class="flex mx-auto justify-center items-center mb-4 w-10 h-10 rounded-full bg-five dark:bg-third lg:h-12 lg:w-12">
                        <img class="w-5 h-5 mx-auto lg:w-6 lg:h-6" src="img/layanan/free.png" />
                    </div>
                    <h3 class="mb-2 text-2xl font-bold dark:text-white">Pengiriman Gratis</h3>
                    <p class="text-gray-500 text-justify">Untuk wilayah Purwokerto Kota barang
                        dapat dikirim secara gratis</p>
                </div>
                <div>
                    <div
                        class="flex mx-auto justify-center items-center mb-4 w-10 h-10 rounded-full bg-five dark:bg-third lg:h-12 lg:w-12">
                        <img class="w-5 h-5 mx-auto lg:w-6 lg:h-6" src="img/layanan/consul.png" />
                    </div>
                    <h3 class="mb-2 text-2xl font-bold dark:text-white">Konsultasi Gratis</h3>
                    <p class="text-gray-500 text-justify">Jika dibutuhkan konsultasi lebih lengkap dan detail dapat
                        dilakukan komunikasi via whatsapp</p>
                </div>
            </div>
        </div>
    </section>
    {{-- akhir layanan --}}
    {{-- cara pemesanan --}}
    <section class="bg-light dark:bg-dark pt-24">
        <div class="container">
            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-10">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Cara Pemesanan</h2>
            </div>
            <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
                <div class="mr-auto place-self-center lg:col-span-7 px-6">
                    <ol class="relative text-gray-500 border-l border-gray-200 dark:border-gray-700 dark:text-gray-400">
                        <li class="mb-10 ml-6">
                            <span
                                class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                1
                            </span>
                            <h3 class="font-medium leading-tight">Menentukan Produk</h3>
                            <p class="text-sm text-justify max-w-lg">Pilih produk dari katalog kemudian kustom ukurannya
                                atau
                                unggah desain yang
                                diinginkan melalui jika ingin full custom kemudian dilanjutkan konsultasi via whatsapp.</p>
                        </li>
                        <li class="mb-10 ml-6">
                            <span
                                class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                2
                            </span>
                            <h3 class="font-medium leading-tight">Isi Form Pemesanan</h3>
                            <p class="text-sm text-justify max-w-lg">Jika produk dipilih dari katalog maka mengisi form
                                data
                                diri beserta ukuran barang yang diinginkan
                                sedangkan jika memiliki referensi desain sendiri dapat mengunggah gambar disertai mengisi
                                form
                                data diri.
                            </p>
                        </li>
                        <li class="mb-10 ml-6">
                            <span
                                class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                3
                            </span>
                            <h3 class="font-medium leading-tight">Pembayaran DP</h3>
                            <p class="text-sm text-justify max-w-lg">Melakukan pembayaran DP sebesar 50% dari harga yang
                                sudah
                                disepakati saat sudah
                                mengisi form pemesanan atau konsultasi via whatsapp.</p>
                        </li>
                        <li class="mb-10 ml-6">
                            <span
                                class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                4
                            </span>
                            <h3 class="font-medium leading-tight">Unggah Bukti Pembayaran</h3>
                            <p class="text-sm text-justify max-w-lg">Setelah melakukan pembayaran DP, dapat mengunggah
                                bukti
                                pembayaran untuk
                                dikonfirmasi admin.</p>
                        </li>
                        <li class="mb-10 ml-6">
                            <span
                                class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                5
                            </span>
                            <h3 class="font-medium leading-tight">Monitoring Pesanan</h3>
                            <p class="text-sm text-justify max-w-lg">Setelah membayar DP pembeli dapat memantau pesanannya
                                melalui website sudah sampai tahap mana.</p>
                        </li>
                        <li class="ml-6">
                            <span
                                class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                6
                            </span>
                            <h3 class="font-medium leading-tight">Pelunasan</h3>
                            <p class="text-sm text-justify max-w-lg">Pelunasan dapat dilakukan setelah barang diterima oleh
                                pembeli.</p>
                        </li>
                    </ol>
                </div>
                <div class="lg:mt-0 lg:col-span-5 lg:flex">
                    <img src="img/cara/cara.png" alt="mockup">
                </div>
            </div>
        </div>
    </section>
    {{-- akhir cara pemesanan --}}
@endsection
