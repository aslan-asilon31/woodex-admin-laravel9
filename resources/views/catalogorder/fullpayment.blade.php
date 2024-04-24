@extends('layouts.app')
@section('content')
    <section class="bg-light dark:bg-dark pt-24">
        <h2 class="mb-5 text-xl font-bold text-center text-gray-900 dark:text-white">Opsi Pelunasan Pembayaran</h3>
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-20 lg:px-6">
                <form action="/fullpayment/submit/{{ $order->id }}" method="post">
                    @method('put')
                    @csrf
                    <ul class="grid w-full gap-6 md:grid-cols-2 mb-10">
                        <li>
                            <input type="radio" id="uploadbuktitf" name="full_payment" value="uploadbuktitf"
                                class="hidden peer" required>
                            <label for="uploadbuktitf"
                                class="items-center w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="block p-5 text-center">
                                    <div class="w-full text-lg font-bold">Upload Bukti Transfer</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="COD" name="full_payment" value="COD" class="hidden peer"
                                required>
                            <label for="COD"
                                class="items-center w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="block p-5 text-center">
                                    <div class="w-full text-lg font-semibold">Bayar Di tempat (Teras Kayu Purwokerto)</div>
                                </div>
                            </label>
                        </li>
                    </ul>
                    <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-16">
                        <button type="submit"
                            class="focus:outline-none text-white bg-third font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Konfirmasi
                        </button>
                    </div>
                </form>
            </div>
    </section>
@endsection
