@extends('layouts.app')
@section('content')
    <section class="bg-light dark:bg-dark pt-24">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
            <div class="grid gap-8 mb-6 lg:mb-10 md:grid-cols-2">
                <div
                    class="items-center border border-gray-200 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-5 mx-auto">
                        <h3 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Kode Pesanan : {{ $order->order_code }}
                        </h3>
                    </div>
                </div>
                <div
                    class="items-center border border-gray-200 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-5 mx-auto">
                        @if ($order->payment_option == 'Lunas')
                            <h3 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Total Bayar : Rp. {{ number_format($order->total_price) }}
                            </h3>
                        @else
                            <h3 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Total Bayar : Rp. {{ number_format($order->dp_price) }}
                            </h3>
                        @endif
                    </div>
                </div>
                {{-- <div
                    class="items-center border border-gray-200 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="w-40 rounded-lg sm:rounded-none sm:rounded-l-lg p-5" src="/img/bayar/bri.png"
                            alt="BRI">
                    </a>
                    <div class="p-5">
                        <h3 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white mb-2">
                            <a href="#">Sety Noviana Sari</a>
                        </h3>
                        <span class="text-gray-500 dark:text-gray-400 mt-4 text-lg">3237-0102-0045-535</span>
                    </div>
                </div>
                <div
                    class="items-center border border-gray-200 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="w-40 rounded-lg sm:rounded-none sm:rounded-l-lg p-5" src="/img/bayar/bca.png"
                            alt="BCA">
                    </a>
                    <div class="p-5">
                        <h3 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white mb-2">
                            <a href="#">Mba Sety</a>
                        </h3>
                        <span class="text-gray-500 dark:text-gray-400 mt-4 text-lg">001-200-300-4</span>
                    </div>
                </div> --}}
            </div>
            <div
                class="items-center mx-auto max-w-screen-sm border mb-3 border-gray-200 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="w-40 rounded-lg sm:rounded-none sm:rounded-l-lg p-5" src="/img/bayar/bri.png"
                        alt="BRI">
                </a>
                <div class="p-5">
                    <h3 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white mb-2">
                        <a href="#">Sety Noviana Sari</a>
                    </h3>
                    <span class="text-gray-500 dark:text-gray-400 mt-4 text-lg">3237-0102-0045-535</span>
                </div>
            </div>
            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-16">
                <form action="/order/evidencetf/{{ $order->id }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-7 w-96 mx-auto">
                        @if (!empty($order->evidencetf))
                            <input type="hidden" name="oldImage" value="{{ $order->evidencetf }}">
                        @endif
                        @if ($order->evidencetf)
                            <img src="{{ asset('storage/' . $order->evidencetf) }}" class="mb-3 img-fluid col-sm-5">
                        @else
                            <img class="mb-3 img-preview img-fluid col-sm-5">
                        @endif
                        <img class="mb-3 img-preview img-fluid w-20 col-sm-5">
                        <input name="evidencetf" id="evidencetf" onchange="previewImage()"
                            @error('evidencetf') is-invalid @enderror
                            class="block w-full px-2 m-0 text-sm font-normal transition ease-in-out border-solid form-control bg-clip-padding focus:text-gray-700 focus:bg-white focus:border-blue-600 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600"
                            id="formFileSm" type="file">
                        @error('evidencetf')
                            <div class="text-base text-red-500">
                                File gambar darus diisi, maksimal 1 MB
                            </div>
                        @enderror
                    </div>
                    <button type="submit"
                        class="focus:outline-none text-white bg-third font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Konfirmasi
                        Pembayaran</button>
                </form>
            </div>
        </div>
    </section>
    <script>
        //fungsi penampil gambar
        function previewImage() {
            const image = document.querySelector('#evidencetf'); //mengambil selector id
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
