@extends('layouts.app')
@section('content')
    <section class="bg-light dark:bg-dark pt-24">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-xl">
            <h4 class="font-bold text-center text-4xl text-gray-900 dark:text-white mb-10">Form Pemesanan</h4>
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="w-full">
                    <div class="form_content bg-gray-50 border border-gray-600 dark:bg-gray-900 mt-10">
                        @foreach ($orderdetails as $orderdetail)
                            <div class="row mb-5 text-right">
                                <form action="/orderform/{{ $orderdetail->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button
                                        class="px-2 py-2 bg-red-600 hover:bg-red-800 rounded-md text-white text-sm font-bold">Batal</button>
                                </form>
                            </div>
                            <div class="row mb-5 w-60 whitespace-nowrap mx-auto">
                                <img src="{{ asset('storage/' . $orderdetail->product->product_image) }}" class="w-fit" />
                            </div>
                            <div class="row mb-5">
                                <p class="text-gray-600 dark:text-white text-center">{{ $orderdetail->product->name }}</p>
                            </div>
                            <div class="row mb-5">
                                <div class="col-30">
                                    <label for="length"
                                        class="font-semibold text-gray-900 dark:text-white">Panjang</label>
                                </div>
                                <div class="col-70">
                                    <input type="number" id="length" name="length" value="{{ $orderdetail->length }}"
                                        readonly
                                        class="rounded-md border-gray-400 text-gray-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white outline-none">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-30">
                                    <label for="height" class="font-semibold text-gray-900 dark:text-white">Tinggi
                                </div>
                                <div class="col-70">
                                    <input type="number" id="height" name="height" value="{{ $orderdetail->height }}"
                                        readonly
                                        class="rounded-md border-gray-400 text-gray-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white outline-none">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-30">
                                    <label for="dp_price" class="font-semibold text-gray-900 dark:text-white">DP 50%</label>
                                </div>
                                <div class="col-70">
                                    <p class="flex text-gray-600 dark:text-white mt-3">
                                        Rp. <input name="dp_price" id="dp_price"
                                            value="{{ number_format($orderdetail->order->dp_price) }}"
                                            class="bg-transparent" readonly>
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-30">
                                    <label for="price" class="font-semibold text-gray-900 dark:text-white">Total
                                        Belanja</label>
                                </div>
                                <div class="col-70">
                                    <p class="flex text-gray-600 dark:text-white mt-3">
                                        Rp. <input name="price" id="price"
                                            value="{{ number_format($orderdetail->order->total_price) }}"
                                            class="bg-transparent" readonly>
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-30">
                                    <label class="font-semibold text-gray-900 dark:text-white">Total Bayar</label>
                                </div>
                                <div class="col-70">
                                    @if ($order->payment_option == 'Lunas')
                                        <p class="flex text-gray-600 dark:text-white mt-3">
                                            Rp. <input name="total_bayar" id="total_bayar"
                                                value="{{ number_format($order->total_price) }}" class="bg-transparent"
                                                readonly>
                                        </p>
                                    @else
                                        <p class="flex text-gray-600 dark:text-white mt-3">
                                            Rp. <input name="total_bayar" id="total_bayar"
                                                value="{{ number_format($order->dp_price) }}" class="bg-transparent"
                                                readonly>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="w-full">
                    <div class="form_content bg-gray-50 border border-gray-600 dark:bg-gray-900 mt-10">
                        <form action="/orderform/address/pick" method="post">
                            @csrf
                            <div id="accordion-flush" data-accordion="collapse"
                                data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                                data-inactive-classes="text-gray-500 dark:text-gray-400">
                                <h2 id="accordion-flush-heading-1">
                                    <button type="button"
                                        class="flex items-center text-lg justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400"
                                        data-accordion-target="#accordion-flush-body-1" aria-expanded="true"
                                        aria-controls="accordion-flush-body-1">
                                        <span>Alamat Pengiriman</span>
                                        <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                                    <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                        @if ($shipments->count() != 0)
                                            <ul class="grid w-full gap-6 md:grid-cols-2">
                                                @foreach ($shipments as $shipment)
                                                    <li>
                                                        <input type="radio" id="shipment{{ $shipment['id'] }}"
                                                            name="shipment_id" value="{{ $shipment['id'] }}"
                                                            {{ $order->shipment_id == $shipment['id'] ? 'checked' : '' }}
                                                            class="hidden peer" required>
                                                        <label for="shipment{{ $shipment['id'] }}"
                                                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                            <div class="block">
                                                                <div class="w-full text-lg font-semibold">
                                                                    {{ $shipment->name }}
                                                                </div>
                                                                <div class="w-full">{{ $shipment->phone_number }}</div>
                                                                <div class="w-full">{{ $shipment->address }}</div>
                                                            </div>
                                                        </label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <figure class="max-w-lg">
                                                <img class="mx-auto" width="100" height="100"
                                                    src="https://img.icons8.com/ios-filled/100/C0C0C0/address--v1.png"
                                                    alt="address--v1">
                                                <figcaption
                                                    class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">
                                                    Data Alamat Masih Kosong</figcaption>
                                            </figure>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="flex flex-col p-3 mx-auto text-center w-full">
                                    <button type="submit"
                                        class="px-2 py-2 bg-third rounded-md text-white text-sm font-bold">Pilih dan Simpan
                                        Alamat</button>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="flex flex-col p-3 mx-auto text-center w-full">
                                <button id="addressAddButton" data-modal-toggle="addressAdd"
                                    class="px-2 py-2 bg-third rounded-md text-white text-sm font-bold">Tambah
                                    Alamat</button>
                                <div id="addressAdd" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                        <!-- Modal content -->
                                        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                            <!-- Modal header -->
                                            <div
                                                class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    Tambah Data Alamat
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-toggle="addressAdd">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form action="/orderform/address" method="post">
                                                @csrf
                                                <div class="grid gap-4 mb-4 sm:grid-cols-2 text-left">
                                                    <div class="sm:col-span-2">
                                                        <label for="name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                            Penerima</label>
                                                        <input type="text" name="name" id="name"
                                                            value="{{ Auth::user()->name }}"
                                                            class="@error('name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                                                            required autofocus>
                                                        @error('name')
                                                            <p id="filled_error_help"
                                                                class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                                                    class="font-medium">{{ $message }}</span>
                                                            </p>
                                                        @enderror
                                                    </div>
                                                    <div class="sm:col-span-2">
                                                        <label for="phone_number"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                                                            HP</label>
                                                        <input type="number" name="phone_number" id="phone_number"
                                                            value="{{ Auth::user()->userData->phone_number ?? '' }}"
                                                            class="@error('phone_number') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                                                            required>
                                                        @error('phone_number')
                                                            <p id="filled_error_help"
                                                                class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                                                    class="font-medium">{{ $message }}</span>
                                                            </p>
                                                        @enderror
                                                    </div>
                                                    <div class="sm:col-span-2">
                                                        <label for="address"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                                        <textarea id="address" name="address" rows="4"
                                                            class="@error('address') is-invalid @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                                                            required></textarea>
                                                        @error('address')
                                                            <p id="filled_error_help"
                                                                class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                                                    class="font-medium">{{ $message }}</span>
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <button type="submit"
                                                    class="text-white inline-flex items-center bg-third font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                    Simpan
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form_content bg-gray-50 border border-gray-600 dark:bg-gray-900 mt-10">
                        <form action="/orderform/paymentoption" method="post">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-30">
                                    <label for="payment_option" class="font-semibold text-gray-900 dark:text-white">Opsi
                                        Pembayaran</label>
                                </div>
                                <div class="col-70">
                                    <select id="payment_option" name="payment_option" onchange="opsiBayar()"
                                        class="rounded-md border-gray-400 text-gray-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white outline-none">
                                        @if ($order->payment_option == 'DP 50%')
                                            <option value="DP 50%" selected>DP 50%</option>
                                            <option value="Lunas">Lunas</option>
                                        @elseif($order->payment_option == 'Lunas')
                                            <option value="DP 50%">DP 50%</option>
                                            <option value="Lunas" selected>Lunas</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row mx-auto">
                                <div class="flex flex-col p-3 mx-auto text-center w-full">
                                    <button type="submit"
                                        class="px-2 py-2 bg-third rounded-md text-white text-sm font-bold">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="mx-auto mt-5">
                <div class="flex flex-col p-3 mx-auto text-center max-w-md">
                    <a href="/orderform/checkout"
                        class="px-2 py-2 bg-third rounded-md text-white text-sm font-bold">Checkout</a>
                </div>
            </div>
        </div>
    </section>
    <script>
        // Fungsi untuk mengisi value total bayar sesuai opsi yang dipilih
        function opsiBayar() {
            // variabel untuk memilih elemen berdasarkan atribut id
            const opsiBayar = document.getElementById("payment_option").value;
            const opsiDP = document.getElementById("dp_price").value;
            const opsiLunas = document.getElementById("price").value;
            const totalBayar = document.getElementById("total_bayar");

            // Cek opsi bayar pada dropdown nama opsi bayar yang dipilih
            if (opsiBayar == "DP 50%") {
                totalBayar.value = opsiDP;
            } else if (opsiBayar == "Lunas") {
                totalBayar.value = opsiLunas;
            }
        }
    </script>
@endsection
