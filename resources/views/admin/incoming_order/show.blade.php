@extends('admin.layouts.app')
@section('content')
    <section class="bg-light dark:bg-dark pt-24 p-3 sm:p-5 sm:ml-64 lg:pt-24">
        @foreach ($orderdetails as $orderdetail)
            {{-- status pesanan --}}
            <div class="py-8 px-4 mx-auto max-w-screen-sm lg:py-10 lg:px-6 ">
                <h4 class="font-bold text-center text-4xl text-gray-900 dark:text-white mb-10">Detail Pesanan</h4>
                <div class="form_content bg-gray-50 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="row mb-5">
                        <div class="col-30">
                            <h2 class="font-bold text-gray-900 dark:text-white">Status Pesanan</h2>
                        </div>
                        <div class="col-70 font-normal text-gray-900 dark:text-white">
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
                            : {{ Carbon\carbon::parse($order->order_date)->format('d-m-Y') }}</div>
                    </div>
                </div>
            </div>
            {{-- akhir status pesanan --}}
            {{-- detail produk --}}
            <div class="py-8 px-4 mx-auto max-w-screen-sm lg:py-10 lg:px-6">
                <h4 class="font-bold text-center text-4xl text-gray-900 dark:text-white mb-10">Detail Produk</h4>
                <div class="mb-6 lg:mb-16">
                    <div class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img class="w-full h-60 rounded-lg sm:rounded-none sm:rounded-l-lg"
                                src="{{ asset('storage/' . $orderdetail->product->product_image) }}"
                                alt="{{ $orderdetail->product->name }}">
                        </a>
                        <div class="p-5">
                            <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $orderdetail->product->name }}
                            </h3>
                            <span class="text-gray-500 dark:text-gray-400">Jumlah : {{ $orderdetail->qty_order }}</span>
                            <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">
                                Rp. {{ number_format($orderdetail->order->total_price) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- akhir detail produk --}}
            {{-- rincian pembayaran --}}
            <div class="py-8 px-4 mx-auto max-w-screen-md lg:py-10 lg:px-6 ">
                <h4 class="font-bold text-center text-4xl text-gray-900 dark:text-white mb-10">Rincian Pembayaran</h4>
                <div class="form_content bg-gray-50 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="row mb-5">
                        <div class="col-30">
                            <h2 class="font-semibold text-gray-900 dark:text-white">Status Pembayaran</h2>
                        </div>
                        @if (!empty($orderdetail->order->evidencetf))
                            <div class="col-70 font-semibold text-gray-900 dark:text-white">
                                : {{ $orderdetail->order->order_status }}</div>
                        @else
                            <div class="col-70 font-semibold text-gray-900 dark:text-white">
                                : {{ $orderdetail->order->payment_status }}</div>
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
                    @if ($orderdetail->order->payment_status == 'DP')
                        <div class="row mb-5">
                            <div class="col-30">
                                <h2 class="font-semibold text-gray-900 dark:text-white">Sisa Pembayaran</h2>
                            </div>
                            <div class="col-70 font-semibold text-gray-900 dark:text-white">
                                : Rp. {{ number_format($orderdetail->order->remaining_payment) }}</div>
                        </div>
                    @endif
                </div>
            </div>
            {{-- akhir rincian pembayaran --}}
            {{-- bukti tf --}}
            <div class="py-8 px-4 mx-auto max-w-screen-md lg:py-16 lg:px-6">
                <h4 class="font-bold text-center text-4xl text-gray-900 dark:text-white mb-10">Bukti Transfer</h4>
                <div class="form_content bg-gray-50 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="row mb-5">
                        <p class="text-gray-600 dark:text-white text-center text-lg font-bold">Bukti Transfer</p>
                    </div>
                    @if (empty($orderdetail->order->evidencetf))
                        <p class="text-gray-600 dark:text-white text-center text-sm font-normal mt-5">Bukti Transfer Masih
                            Kosong</p>
                    @else
                        <div class="row mb-5 w-60 whitespace-nowrap mx-auto">
                            <img src="{{ asset('storage/' . $orderdetail->order->evidencetf) }}" class="w-fit"
                                alt="{{ $orderdetail->product->name }}" />
                        </div>
                    @endif
                    <div class="row mb-5">
                        <p class="text-gray-600 dark:text-white text-center text-lg font-bold">Bukti Transfer Pelunasan</p>
                    </div>
                    @if (empty($orderdetail->order->evidencetf2))
                        <p class="text-gray-600 dark:text-white text-center text-sm font-normal mt-10">Bukti Transfer Masih
                            Kosong</p>
                    @else
                        <div class="row mb-5 w-60 whitespace-nowrap mx-auto">
                            <img src="{{ asset('storage/' . $orderdetail->order->evidencetf2) }}" class="w-fit"
                                alt="{{ $orderdetail->product->name }}" />
                        </div>
                    @endif
                </div>
            </div>
            {{-- akhir bukti tf --}}
            {{-- data pengiriman --}}
            <div class="py-8 px-4 mx-auto max-w-screen-md lg:py-16 lg:px-6 ">
                <h4 class="font-bold text-center text-4xl text-gray-900 dark:text-white mb-10">Detail Pengiriman</h4>
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
            </div>
            {{-- akhir data pengiriman --}}
        @endforeach
    </section>
@endsection
