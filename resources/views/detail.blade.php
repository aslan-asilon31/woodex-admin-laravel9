@extends('layouts.app')
@section('content')
    <section class="bg-light dark:bg-dark pt-24 pb-24">
        <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{ $product->title }}
            </h2>
        </div>
        <div class="flex flex-col px-8 gap-4 lg:flex-row py-4">
            <div class="py-8 max-w-xl lg:py-0">
                <div>
                    <img class="h-96 max-w-md rounded-lg" src="{{ asset('storage/' . $product->product_image) }}"
                        alt="{{ $product->name }}">
                </div>
            </div>
            <div class="py-8 px-4 max-w-2xl lg:py-0">
                <h2 class="mb-6 text-2xl font-bold leading-none text-gray-900 md:text-4xl dark:text-white">
                    {{ $product->name }}
                </h2>
                <dl class="flex items-center space-x-6">
                    <div>
                        <dt class="mb-2 font-semibold text-xl leading-none text-gray-900 dark:text-white">Kategori</dt>
                        <dd class="mb-4 font-light text-gray-500 text-lg sm:mb-5 dark:text-gray-400">
                            <a href="/categories/{{ $product->category->slug }}">{{ $product->category->name }}</a>
                        </dd>
                    </div>
                </dl>
                <dl>
                    <dt class="mb-2 font-semibold leading-none text-xl text-gray-900 dark:text-white">Deskripsi</dt>
                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 text-lg dark:text-gray-400 text-justify">
                        {{ $product->description }}
                    </dd>
                </dl>
                <div class="flex items-center space-x-4">
                    <form action="/order/{{ $product->id }}" method="post">
                        @csrf
                        <div class="grid grid-cols-3 gap-3">
                            <div class="flex items-center">
                                <label for="qty_order" class="text-black dark:text-white">Jumlah</label>
                                <div class="relative w-full lg:w-20">
                                    <input type="number" id="qty_order" name="qty_order" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        autofocus>
                                    @error('qty_order')
                                        <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                                class="font-medium">{{ $message }}</span>
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex items-center">
                                <label for="length" class="text-black dark:text-white">Panjang</label>
                                <div class="relative w-full lg:w-20">
                                    <input type="number" id="length" name="length" step="any" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('length')
                                        <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                                class="font-medium">{{ $message }}</span>
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex items-center">
                                <label for="height" class="text-black dark:text-white">Tinggi</label>
                                <div class="relative w-full lg:w-20">
                                    <input type="number" id="height" name="height" step="any" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('height')
                                        <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                                class="font-medium">{{ $message }}</span>
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <label for="remember" class="text-sm font-bold text-gray-900 dark:text-gray-300">Catatan :
                                Panjang
                                dan tinggi dalam satuan centimeter</label>
                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-third font-medium rounded-lg text-sm px-5 py-2.5 mt-5 text-center">
                            Pesan
                        </button>
                    </form>
                </div>
            </div>
    </section>
@endsection
