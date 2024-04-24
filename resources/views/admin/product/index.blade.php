@extends('admin.layouts.app')
@section('content')
    <section class="bg-light dark:bg-dark pt-24 p-3 sm:p-5 sm:ml-64 lg:pt-24">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-4">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <form action="#" method="GET" class="w-full md:w-1/2 flex items-center">
                        <input type="text" name="search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            placeholder="cari produk">
                    </form>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button type="button"
                            class="flex items-center justify-center text-white bg-third font-medium rounded-lg text-sm px-4 py-2">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg><a href="/admin/product/create">
                                Tambah Produk</a>
                        </button>
                    </div>
                </div>
                @if ($products->count() != 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Gambar</th>
                                    <th scope="col" class="px-4 py-3">Nama</th>
                                    <th scope="col" class="px-4 py-3">Deskripsi</th>
                                    <th scope="col" class="px-4 py-3">Harga Permeter</th>
                                    <th scope="col" class="px-4 py-3">Kategori</th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="sr-only">Aksi</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="px-4 py-3 w-52 p-4">
                                            <img src="{{ asset('storage/' . $product->product_image) }}"
                                                alt="{{ $product->name }}">
                                        </td>
                                        <td class="px-4 py-3">{{ $product->name }}</td>
                                        <td class="px-4 py-3 text-justify">{{ $product->description }}</td>
                                        <td class="px-4 py-3 text-justify">Rp. {{ number_format($product->price_meter) }}
                                        </td>
                                        <td class="px-4 py-3">{{ $product->category->name }}</td>
                                        <td class="px-4 py-3">
                                            <div class="flex justify-start gap-3">
                                                {{-- <a href="/admin/product/{{ $product->slug }}"
                                                class="font-medium text-green-600 dark:text-green-500 hover:underline">Tampil</a> --}}
                                                <a href="/admin/product/{{ $product->slug }}/edit"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                <form action="/admin/product/{{ $product->slug }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="/admin/product/{{ $product->slug }}" data-confirm-delete="true"
                                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</a>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="relative overflow-hidden bg-white rounded-b-lg shadow-md dark:bg-gray-800">
                            <nav class="items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0">
                                {{ $products->links() }}
                            </nav>
                        </div>
                    </div>
                @else
                    <div class="py-8 px-4 mx-auto max-w-screen-md text-center lg:py-16 lg:px-12">
                        <img class="mx-auto mb-4 w-32 h-32" src="https://img.icons8.com/ios/100/ffffff/nothing-found.png"
                            alt="nothing-found" />
                        <h1
                            class="mb-4 text-xl font-bold tracking-tight leading-none text-gray-900 lg:mb-6 md:text-2xl xl:text-3xl dark:text-white">
                            Produk tidak ditemukan</h1>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
