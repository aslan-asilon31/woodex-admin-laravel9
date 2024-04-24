@extends('layouts.app')
@section('content')
    <section class="bg-light dark:bg-dark p-3 sm:p-5">
        @if ($fullCustoms->count() != 0)
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12 pt-36 pb-20">
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full">
                            <form action="/fullcustom-orders" method="get">
                                <label for="default-search"
                                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                    <input type="search" id="default-search" name="search" value="{{ request('search') }}"
                                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="cari pesanan" required>
                                    <button type="submit"
                                        class="text-white absolute right-2.5 bottom-2.5 bg-blue-950 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Tanggal</th>
                                    <th scope="col" class="px-4 py-3">Deskripsi</th>
                                    <th scope="col" class="px-4 py-3">Gambar</th>
                                    <th scope="col" class="px-4 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fullCustoms as $custom)
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="px-4 py-3">
                                            {{ Carbon\carbon::parse($custom->fullcustom_date)->format('d-m-Y') }}</td>
                                        <td class="px-4 py-3">{{ $custom->description }}</td>
                                        <td class="px-4 py-3">
                                            <img src="{{ asset('storage/' . $custom->image_custom) }}"
                                                class="mx-auto w-52 h-36">
                                        </td>
                                        <td class="px-4 py-3">
                                            <a href="/fullcustom/detail/{{ $custom->id }}" data-mdb-ripple="true"
                                                data-mdb-ripple-color="light"
                                                class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out">
                                                Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-sm text-center">
                    <img class="mx-auto mb-4 w-60 h-52" src="https://img.icons8.com/color/96/empty-box.png"
                        alt="empty-box" />
                    <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Pesanan
                        Full Custom Kosong</p>
                    <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Silahkan
                        mengisi form terlebih dahulu</p>
                    <a href="/fullcustom-form"
                        class="inline-flex text-white bg-third hover:bg-four focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center my-4">Form
                        Pemesanan</a>
                </div>
            </div>
        @endif
    </section>
@endsection
