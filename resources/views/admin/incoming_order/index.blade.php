@extends('admin.layouts.app')
@section('content')
    <section class="bg-light dark:bg-dark pt-24 p-3 sm:p-5 sm:ml-64 lg:pt-24">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-4">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full">
                        <form action="/admin/incomingorder" method="get">
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
                                <input type="search" id="default-search" name="search" value="{{ request('search') }}"
                                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <button type="submit"
                                    class="text-white absolute right-2.5 bottom-2.5 bg-blue-950 font-medium rounded-lg text-sm px-4 py-2">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
                @if ($orders->count() != 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Nama</th>
                                    <th scope="col" class="px-4 py-3">Tanggal</th>
                                    <th scope="col" class="px-4 py-3">Total Harga</th>
                                    <th scope="col" class="px-4 py-3">Sisa Pembayaran</th>
                                    <th scope="col" class="px-4 py-3">Status Pesanan</th>
                                    <th scope="col" class="px-4 py-3">Status Pembayaran</th>
                                    {{-- <th scope="col" class="px-4 py-3">Bukti Transfer</th> --}}
                                    <th scope="col" class="px-4 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr class="border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $order->user->name }} </th>
                                        <td class="px-4 py-3">
                                            {{ Carbon\carbon::parse($order->order_date)->format('d-m-Y') }}</td>
                                        <td class="px-4 py-3">Rp. {{ number_format($order->total_price) }}</td>
                                        <td class="px-4 py-3">Rp. {{ number_format($order->remaining_payment) }}</td>
                                        <td class="px-4 py-3">
                                            <div
                                                class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md ">
                                                {{ $order->order_status }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">
                                            @if (!empty($order->evidencetf))
                                                <div
                                                    class="inline-block px-6 py-2.5 bg-yellow-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md ">
                                                    {{ $order->order_status }}
                                                </div>
                                            @else
                                                <div
                                                    class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md ">
                                                    {{ $order->payment_status }}
                                                </div>
                                            @endif
                                        </td>
                                        <td class="flex flex-col items-center px-4 py-3 space-x-3">
                                            <a href="/admin/incomingorder/detail/{{ $order->id }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                                            <a href="/admin/incomingorder/proses/{{ $order->id }}"
                                                class="font-medium text-yellow-600 dark:text-yellow-500 hover:underline">Proses</a>
                                            <form action="/admin/incomingorder/delete/{{ $order->id }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <a href="/admin/incomingorder/delete/{{ $order->id }}"
                                                    class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                                    data-confirm-delete="true">Hapus</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="relative overflow-hidden bg-white rounded-b-lg shadow-md dark:bg-gray-800">
                            <nav class="items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0">
                                {{ $orders->links() }}
                            </nav>
                        </div>
                    </div>
                @else
                    <div class="py-8 px-4 mx-auto max-w-screen-md text-center lg:py-16 lg:px-12">
                        <img class="mx-auto mb-4 w-32 h-32" src="https://img.icons8.com/ios/100/ffffff/nothing-found.png"
                            alt="nothing-found" />
                        <h1
                            class="mb-4 text-xl font-bold tracking-tight leading-none text-gray-900 lg:mb-6 md:text-2xl xl:text-3xl dark:text-white">
                            Pesanan Masuk Tidak Ditemukan</h1>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
