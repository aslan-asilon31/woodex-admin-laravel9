@extends('layouts.app')
@section('content')
    {{-- produk --}}
    <section class="bg-light dark:bg-dark pt-24 pb-24">
        <div class="container">
            <form class="px-6" action="/catalog">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" name="search" id="default-search"
                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Cari produk" value="{{ request('search') }}">
                    <button type="submit"
                        class="text-white absolute right-2.5 bottom-2.5 bg-four hover:bg-five font-medium rounded-lg text-sm px-4 py-2">Search</button>
                </div>
            </form>
            @if ($products->count())
                <div class="py-4 px-6 mx-auto lg:max-w-screen-xl">
                    <div class="grid mx-auto gap-8 mb-6 grid-cols-1 lg:mb-8 md:grid-cols-2 lg:grid-cols-4">
                        @foreach ($products as $product)
                            <div
                                class="w-full mx-auto max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <a href="product/detail/{{ $product->slug }}">
                                    <img class="p-4 rounded-t-lg" src="{{ asset('storage/' . $product->product_image) }}"
                                        alt="{{ $product->name }}" />
                                </a>
                                <div class="px-5 pb-5">
                                    <div class="flex items-center justify-between">
                                        <div class="mb-2 w-20 text-center">
                                            <p
                                                class="py-1 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-50 rounded-lg font-normal text-xs">
                                                <a
                                                    href="/categories/{{ $product->category->slug }}">{{ $product->category->name }}</a>
                                            </p>
                                        </div>
                                    </div>
                                    <a href="product/detail/{{ $product->slug }}">
                                        <h5 class="text-xl font-bold tracking-wide text-black dark:text-white mb-3">
                                            {{ $product->name }}</h5>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="py-8 px-4 mx-auto max-w-screen-md text-center lg:py-16 lg:px-12">
                    <img class="mx-auto mb-4 w-32 h-32" src="https://img.icons8.com/ios/100/ffffff/nothing-found.png"
                        alt="nothing-found" />
                    <h1
                        class="mb-4 text-xl font-bold tracking-tight leading-none text-gray-900 lg:mb-6 md:text-2xl xl:text-3xl dark:text-white">
                        Produk Tidak Ditemukan</h1>
                </div>
            @endif
            {{ $products->links() }}
        </div>
    </section>
    {{-- akhir produk --}}
@endsection
