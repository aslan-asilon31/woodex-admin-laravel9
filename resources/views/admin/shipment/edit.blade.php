@extends('admin.layouts.app')
@section('content')
    <section class="bg-light dark:bg-dark pt-24 p-3 sm:p-5 sm:ml-64 lg:pt-20">
        <div class="py-8 px-4 mx-auto w-full lg:py-16">
            <form action="/admin/allorder/shipment/edit/{{ $order->id }}" method="post">
                @method('put')
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="shipping_method"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Pengiriman</label>
                        <select id="shipping_method" name="shipping_method" onchange="opsiKirim()"
                            class="@error('shipping_method') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @if (empty($order->shipping_method))
                                <option selected>Pilih opsi</option>
                                <option value="Gratis Pengiriman">Gratis Pengiriman</option>
                                <option value="Ekspedisi">Ekspedisi</option>
                            @elseif ($order->shipping_method == 'Gratis Pengiriman')
                                <option value="Gratis Pengiriman" selected>Gratis Pengiriman</option>
                                <option value="Ekspedisi">Ekspedisi</option>
                            @else
                                <option value="Gratis Pengiriman">Gratis Pengiriman</option>
                                <option value="Ekspedisi" selected>Ekspedisi</option>
                            @endif
                        </select>
                        @error('shipping_method')
                            <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                    class="font-medium">{{ $message }}</span>
                            </p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="shipping_service"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jasa Pengiriman</label>
                        <input type="text" name="shipping_service" id="shipping_service"
                            value="{{ old('shipping_service', $order->shipping_service ?? '') }}"
                            class="@error('shipping_service') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('shipping_service')
                            <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                    class="font-medium">{{ $message }}</span>
                            </p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="resi_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                            Resi</label>
                        <input type="text" name="resi_number" id="resi_number"
                            value="{{ old('resi_number', $order->resi_number ?? '') }}"
                            class="@error('resi_number') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('resi_number')
                            <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                    class="font-medium">{{ $message }}</span>
                            </p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="postage" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ongkos
                            Kirim</label>
                        <input type="number" name="postage" id="postage"
                            value="{{ old('postage', $order->postage ?? '') }}"
                            class="@error('postage') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @error('postage')
                            <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                    class="font-medium">{{ $message }}</span>
                            </p>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded-lg bg-third">
                    Simpan
                </button>
            </form>
        </div>
    </section>
    <script>
        function opsiKirim() {
            const opsiKirim = document.getElementById("shipping_method").value;

            if (opsiKirim == "Gratis Pengiriman") {
                document.getElementById("shipping_service").disabled = true;
                document.getElementById("resi_number").disabled = true;
                document.getElementById("postage").disabled = true;
            } else {
                document.getElementById("shipping_service").disabled = false;
                document.getElementById("resi_number").disabled = false;
                document.getElementById("postage").disabled = false;
            }
        }
    </script>
@endsection
