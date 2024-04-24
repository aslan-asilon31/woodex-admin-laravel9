@extends('layouts.app')
@section('content')
    <section class="bg-light dark:bg-dark pt-24 p-3 sm:p-5 lg:pt-24">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/orders"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                        Daftar Pesanan
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Detail
                            Pesanan</span>
                    </div>
                </li>
            </ol>
        </nav>
        @foreach ($orderdetails as $orderdetail)
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                    data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="order-tab" data-tabs-target="#order"
                            type="button" role="tab" aria-controls="order" aria-selected="false">Detail
                            Pesanan</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="product-tab" data-tabs-target="#product" type="button" role="tab"
                            aria-controls="product" aria-selected="false">Detail Produk</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="payment-tab" data-tabs-target="#payment" type="button" role="tab"
                            aria-controls="payment" aria-selected="false">Detail Pembayaran</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="evidence-tab" data-tabs-target="#evidence" type="button" role="tab"
                            aria-controls="evidence" aria-selected="false">Bukti Transfer</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="shipment-tab" data-tabs-target="#shipment" type="button" role="tab"
                            aria-controls="shipment" aria-selected="false">Detail Pengiriman</button>
                    </li>
                </ul>
            </div>
            <div id="myTabContent">
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="order" role="tabpanel"
                    aria-labelledby="order-tab">
                    <div class="form_content bg-gray-50 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="row mb-5">
                            <div class="col-30">
                                <h2 class="font-bold text-gray-900 dark:text-white">Status Pesanan</h2>
                            </div>
                            <div id="status" class="col-70 font-normal text-gray-900 dark:text-white">
                                : {{ $orderdetail->order->order_status }}</div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-30">
                                <h2 class="font-bold text-gray-900 dark:text-white">Kode Pesanan</h2>
                            </div>
                            <div class="col-70 font-normal text-gray-900 dark:text-white">:
                                {{ $orderdetail->order->order_code }}
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-30">
                                <h2 class="font-bold text-gray-900 dark:text-white">Tanggal Pesan</h2>
                            </div>
                            <div class="col-70 font-normal text-gray-900 dark:text-white">
                                : {{ Carbon\carbon::parse($orderdetail->order->order_date)->format('d-m-Y') }}</div>
                        </div>
                    </div>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="product" role="tabpanel"
                    aria-labelledby="product-tab">
                    <div class="mx-auto">
                        <div
                            class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <img class="w-full h-60 rounded-lg sm:rounded-none sm:rounded-l-lg"
                                    src="{{ asset('storage/' . $orderdetail->product->product_image) }}"
                                    alt="{{ $orderdetail->product->name }}">
                            </a>
                            <div class="p-5">
                                <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $orderdetail->product->name }}
                                </h3>
                                <span class="text-gray-500 dark:text-gray-400">Jumlah :
                                    {{ $orderdetail->qty_order }}</span>
                                <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">
                                    Rp. {{ number_format($orderdetail->order->total_price) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="payment" role="tabpanel"
                    aria-labelledby="payment-tab">
                    <div class="form_content bg-gray-50 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="row mb-5">
                            <div class="col-30">
                                <h2 class="font-semibold text-gray-900 dark:text-white">Status Pembayaran</h2>
                            </div>
                            <div class="col-70 font-semibold text-gray-900 dark:text-white">
                                : {{ $orderdetail->order->payment_status }}</div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-30">
                                <h2 class="font-semibold text-gray-900 dark:text-white">Sisa Pembayaran</h2>
                            </div>
                            @if ($orderdetail->order->payment_status == 'Lunas')
                                <div class="col-70 font-semibold text-gray-900 dark:text-white">: Rp.
                                    0</div>
                            @else
                                <div class="col-70 font-semibold text-gray-900 dark:text-white">: Rp.
                                    {{ number_format($orderdetail->order->remaining_payment) }}</div>
                            @endif
                        </div>
                        <div class="row mb-5">
                            <div class="col-30">
                                <h2 class="font-semibold text-gray-900 dark:text-white">Pembayaran DP</h2>
                            </div>
                            <div class="col-70 font-semibold text-gray-900 dark:text-white">: Rp.
                                {{ number_format($orderdetail->order->dp_price) }}</div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-30">
                                <h2 class="font-semibold text-gray-900 dark:text-white">Total Belanja</h2>
                            </div>
                            <div class="col-70 font-semibold text-gray-900 dark:text-white">
                                : Rp. {{ number_format($orderdetail->order->total_price) }}</div>
                        </div>
                        @if ($orderdetail->order->shipping_method == 'Ekspedisi')
                            <div class="row mb-5">
                                <div class="col-30">
                                    <h2 class="font-semibold text-gray-900 dark:text-white">Ongkos Kirim</h2>
                                </div>
                                <div class="col-70 font-semibold text-gray-900 dark:text-white">
                                    : Rp. {{ number_format($orderdetail->order->postage) }}</div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="evidence" role="tabpanel"
                    aria-labelledby="evidence-tab">
                    <div
                        class="form_content bg-gray-50 rounded-lg grid grid-cols-1 gap-8 lg:grid-cols-2 shadow dark:bg-gray-800 dark:border-gray-700">
                        <div>
                            <div class="row mb-5">
                                <p class="text-gray-600 dark:text-white text-center text-lg font-bold">Bukti Transfer</p>
                            </div>
                            @if (empty($orderdetail->order->evidencetf))
                                <p class="text-gray-600 dark:text-white text-center text-sm font-normal mt-5">Bukti
                                    Transfer
                                    Masih
                                    Kosong</p>
                            @else
                                <div class="row mb-5 w-full whitespace-nowrap mx-auto">
                                    <img src="{{ asset('storage/' . $orderdetail->order->evidencetf) }}" class="w-fit"
                                        alt="{{ $orderdetail->product->name }}" />
                                </div>
                            @endif
                        </div>
                        <div>
                            <div class="row mb-5">
                                <p class="text-gray-600 dark:text-white text-center text-lg font-bold">Bukti Transfer
                                    Pelunasan
                                </p>
                            </div>
                            @if (empty($orderdetail->order->evidencetf2))
                                <p class="text-gray-600 dark:text-white text-center text-sm font-normal mt-10">Bukti
                                    Transfer
                                    Masih
                                    Kosong</p>
                            @else
                                <div class="row mb-5 w-full whitespace-nowrap mx-auto">
                                    <img src="{{ asset('storage/' . $orderdetail->order->evidencetf2) }}" class="w-fit"
                                        alt="{{ $orderdetail->product->name }}" />
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="shipment" role="tabpanel"
                    aria-labelledby="shipment-tab">
                    <div class="form_content bg-gray-50 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="row mb-5">
                            <div class="col-30">
                                <h2 class="font-semibold text-gray-900 dark:text-white">Jenis Pengiriman</h2>
                            </div>
                            @if (!empty($orderdetail->order->shipping_method))
                                <div class="col-70 font-semibold text-gray-900 dark:text-white">
                                    : {{ $orderdetail->order->shipping_method }}</div>
                            @else
                                <div class="col-70 font-semibold text-gray-900 dark:text-white">
                                    : Belum ditentukan</div>
                            @endif
                        </div>
                        <div class="row mb-5">
                            <div class="col-30">
                                <h2 class="font-semibold text-gray-900 dark:text-white">Jasa Pengiriman</h2>
                            </div>
                            @if (!empty($orderdetail->order->shipping_service))
                                <div class="col-70 font-semibold text-gray-900 dark:text-white">
                                    : {{ $orderdetail->order->shipping_service }}</div>
                            @else
                                <div class="col-70 font-semibold text-gray-900 dark:text-white">
                                    : Tidak Tersedia</div>
                            @endif
                        </div>
                        <div class="row mb-5">
                            <div class="col-30">
                                <h2 class="font-semibold text-gray-900 dark:text-white">No Resi</h2>
                            </div>
                            @if (!empty($orderdetail->order->resi_number))
                                <div class="col-70 font-semibold text-gray-900 dark:text-white">
                                    : {{ $orderdetail->order->resi_number }}</div>
                            @else
                                <div class="col-70 font-semibold text-gray-900 dark:text-white">
                                    : Tidak tersedia</div>
                            @endif
                        </div>
                        <div class="row mb-5">
                            <div class="col-30">
                                <h2 class="font-semibold text-gray-900 dark:text-white">Nama</h2>
                            </div>
                            <div class="col-70 font-semibold text-gray-900 dark:text-white">
                                : {{ $orderdetail->order->shipment->name }}</div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-30">
                                <h2 class="font-semibold text-gray-900 dark:text-white">No HP</h2>
                            </div>
                            <div class="col-70 font-semibold text-gray-900 dark:text-white">
                                : {{ $orderdetail->order->shipment->phone_number }}</div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-30">
                                <h2 class="font-semibold text-gray-900 dark:text-white">Alamat</h2>
                            </div>
                            <div class="col-70 font-semibold text-gray-900 dark:text-white">
                                : {{ $orderdetail->order->shipment->address }}</div>
                        </div>
                    </div>
                    <div class="mx-auto mt-5">
                        @if ($orderdetail->order->order_status == 'Diterima')
                            <div class="flex flex-col p-3 mx-auto text-center w-full">
                                <h3 class="px-2 py-2 bg-green-600 rounded-md text-white text-sm font-bold">Pesanan
                                    Selesai</h3>
                            </div>
                        @else
                            <form action="/complete/order" method="post">
                                @method('put')
                                @csrf
                                <div class="flex flex-col p-3 mx-auto text-center w-full">
                                    <button type="submit" id="accept"
                                        class="px-2 py-2 bg-third rounded-md text-white text-sm font-bold">Pesanan
                                        Diterima</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <script>
        const diterima = document.getElementById("status").value;

        if (diterima == "Diterima") {
            document.getElementById("accept").disabled = true;
        } else {
            document.getElementById("accept").disabled = false;
        }
    </script>
@endsection
