@extends('admin.layouts.app')
@section('content')
    <section class="bg-light dark:bg-dark pt-24 p-3 sm:p-5 sm:ml-64 lg:pt-24">
        <div class="mx-auto max-w-screen-lg px-4 lg:px-4">
            <div class="bg-gray-50 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 py-8 px-4">
                <form action="/admin/allorder/edit/konfirmasi/{{ $order->id }}" method="post">
                    @method('put')
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="invoice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                Pesanan</label>
                            <input type="text" name="invoice" id="invoice"
                                value="{{ old('invoice', $order->order_code) }}" disabled readonly
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="total_price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Belanja</label>
                            <input type="text" name="total_price" id="total_price"
                                value="Rp. {{ old('total_price', number_format($order->total_price)) }}" disabled readonly
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="remaining_payment"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sisa Pembayaran</label>
                            <input type="text" name="remaining_payment" id="remaining_payment"
                                value="Rp. {{ old('remaining_payment', number_format($order->remaining_payment)) }}"
                                disabled readonly
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="evidencetf"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bukti Transfer</label>
                            <input type="hidden" name="oldImage" value="{{ $order->evidencetf }}">
                            @if ($order->evidencetf)
                                <img src="{{ asset('storage/' . $order->evidencetf) }}" class="h-auto max-w-md img-preview">
                            @else
                                <img class="h-auto max-w-md img-preview">
                            @endif
                        </div>
                        <div class="sm:col-span-2">
                            <label for="evidencetf2"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bukti Transfer
                                Pelunasan</label>
                            <input type="hidden" name="oldImage" value="{{ $order->evidencetf2 }}">
                            @if ($order->evidencetf2)
                                <img src="{{ asset('storage/' . $order->evidencetf2) }}"
                                    class="h-auto max-w-md img-preview">
                            @else
                                <img class="h-auto max-w-md img-preview">
                            @endif
                        </div>
                        <div class="sm:col-span-2">
                            <label for="order_status"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Pesanan</label>
                            <select name="order_status" id="order_status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                @if ($order->order_status == 'Diproses')
                                    <option value="Diproses" selected>Pesanan Diproses</option>
                                    <option value="Jadi">Pesanan Jadi</option>
                                    <option value="Dikirim">Sedang Dikirim</option>
                                    <option value="Diterima">Pesanan Diterima</option>
                                @elseif($order->order_status == 'Jadi')
                                    <option value="Diproses">Pesanan Diproses</option>
                                    <option value="Jadi" selected>Pesanan Jadi</option>
                                    <option value="Dikirim">Sedang Dikirim</option>
                                    <option value="Diterima">Pesanan Diterima</option>
                                @elseif($order->order_status == 'Dikirim')
                                    <option value="Diproses">Pesanan Diproses</option>
                                    <option value="Jadi">Pesanan Jadi</option>
                                    <option value="Dikirim" selected>Sedang Dikirim</option>
                                    <option value="Diterima">Pesanan Diterima</option>
                                @elseif($order->order_status == 'Diterima')
                                    <option value="Diproses">Pesanan Diproses</option>
                                    <option value="Jadi">Pesanan Jadi</option>
                                    <option value="Dikirim">Sedang Dikirim</option>
                                    <option value="Diterima" selected>Pesanan Diterima</option>
                                @elseif($order->order_status == 'Batal')
                                    <option value="Diproses">Pesanan Diproses</option>
                                    <option value="Jadi">Pesanan Jadi</option>
                                    <option value="Dikirim">Sedang Dikirim</option>
                                    <option value="Diterima">Pesanan Diterima</option>
                                @endif
                            </select>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="payment_status"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                Pembayaran</label>
                            <select name="payment_status" id="payment_status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                @if ($order->payment_status == 'DP')
                                    <option value="DP" selected>DP 50%</option>
                                    <option value="Lunas">Lunas</option>
                                @elseif ($order->payment_status == 'Lunas')
                                    <option value="DP">DP 50%</option>
                                    <option value="Lunas" selected>Lunas</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-third rounded-lg">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
