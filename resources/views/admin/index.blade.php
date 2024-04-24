@extends('admin.layouts.app')
@section('content')
    <section class="bg-light dark:bg-dark p-3 sm:p-5 sm:ml-64 pt-24 lg:pt-24">
        <div class="max-w-7xl w-full mx-auto py-6 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-8">
                <div class="w-full lg:w-1/4">
                    <div
                        class="widget w-full p-4 rounded-lg shadow-md bg-gray-100 dark:bg-gray-700 border-l-4 border-purple-400">
                        <div class="flex items-center">
                            <div class="icon w-14 p-3.5 bg-purple-400 text-white rounded-full mr-3">
                                <img src="https://img.icons8.com/dotty/100/ffffff/sorting-answers.png"
                                    alt="sorting-answers" />
                            </div>
                            <div class="flex flex-col justify-center">
                                <div class="text-lg text-black dark:text-white">{{ $category }}</div>
                                <div class="text-sm text-gray-900 dark:text-gray-200">Kategori</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/4">
                    <div
                        class="widget w-full p-4 rounded-lg bg-gray-100 shadow-md dark:bg-gray-700 border-l-4 border-blue-400">
                        <div class="flex items-center">
                            <div class="icon w-14 p-3.5 bg-blue-400 text-white rounded-full mr-3">
                                <img src="https://img.icons8.com/external-tanah-basah-glyph-tanah-basah/100/ffffff/external-customer-advertisement-tanah-basah-glyph-tanah-basah.png"
                                    alt="external-customer-advertisement-tanah-basah-glyph-tanah-basah" />
                            </div>
                            <div class="flex flex-col justify-center">
                                <div class="text-lg text-black dark:text-white">{{ $user }}</div>
                                <div class="text-sm text-gray-900 dark:text-gray-200">Pelanggan</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/4">
                    <div
                        class="widget w-full p-4 rounded-lg bg-gray-100 shadow-md dark:bg-gray-700 border-l-4 border-yellow-400">
                        <div class="flex items-center">
                            <div class="icon w-14 p-3.5 bg-yellow-400 text-white rounded-full mr-3">
                                <img src="https://img.icons8.com/pastel-glyph/100/ffffff/accent-chair--v1.png"
                                    alt="accent-chair--v1" />
                            </div>
                            <div class="flex flex-col justify-center">
                                <div class="text-lg text-black dark:text-white">{{ $product }}</div>
                                <div class="text-sm text-gray-900 dark:text-gray-200">Produk</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/4">
                    <div
                        class="widget w-full p-4 rounded-lg bg-gray-100 shadow-md dark:bg-gray-700 border-l-4 border-red-400">
                        <div class="flex items-center">
                            <div class="icon w-14 p-3.5 bg-red-400 text-white rounded-full mr-3">
                                <img src="https://img.icons8.com/ios-filled/100/ffffff/online-maintenance-portal.png"
                                    alt="icon pesanan custom" />
                            </div>
                            <div class="flex flex-col justify-center">
                                <div class="text-lg text-black dark:text-white">{{ $accept }}</div>
                                <div class="text-sm text-gray-900 dark:text-gray-200">Pesanan Katalog</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-8">
                <div class="w-full lg:w-1/4">
                    <div
                        class="widget w-full p-4 rounded-lg bg-gray-100 shadow-md dark:bg-gray-700 border-l-4 border-blue-500">
                        <div class="flex items-center">
                            <div class="icon w-14 p-3.5 bg-blue-500 text-white rounded-full mr-3">
                                <img src="https://img.icons8.com/ios-filled/100/ffffff/windows10-personalization.png"
                                    alt="icon pesanan full custom" />
                            </div>
                            <div class="flex flex-col justify-center">
                                <div class="text-lg text-black dark:text-white">{{ $fcustom }}</div>
                                <div class="text-sm text-gray-900 dark:text-gray-200">Full Kustom</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/4">
                    <div
                        class="widget w-full p-4 rounded-lg bg-gray-100 shadow-md dark:bg-gray-700 border-l-4 border-zinc-500">
                        <div class="flex items-center">
                            <div class="icon w-14 p-3.5 bg-zinc-500 text-white rounded-full mr-3">
                                <img src="https://img.icons8.com/external-glyph-silhouettes-icons-papa-vector/100/ffffff/external-Down-Payment-property-sale-glyph-silhouettes-icons-papa-vector.png"
                                    alt="external-Down-Payment-property-sale-glyph-silhouettes-icons-papa-vector" />
                            </div>
                            <div class="flex flex-col justify-center">
                                <div class="text-lg text-black dark:text-white">{{ $dppay }}</div>
                                <div class="text-sm text-gray-900 dark:text-gray-200">DP 50%</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/4">
                    <div
                        class="widget w-full p-4 rounded-lg bg-gray-100 shadow-md dark:bg-gray-700 border-l-4 border-green-500">
                        <div class="flex items-center">
                            <div class="icon w-14 p-3.5 bg-green-500 text-white rounded-full mr-3">
                                <img src="https://img.icons8.com/ios-filled/100/ffffff/online-payment-.png"
                                    alt="online-payment-" />
                            </div>
                            <div class="flex flex-col justify-center">
                                <div class="text-lg text-black dark:text-white">{{ $clearpay }}</div>
                                <div class="text-sm text-gray-900 dark:text-gray-200">Lunas</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/4">
                    <div
                        class="widget w-full p-4 rounded-lg bg-gray-100 shadow-md dark:bg-gray-700 border-l-4 border-yellow-600">
                        <div class="flex items-center">
                            <div class="icon w-14 p-3.5 bg-yellow-600 text-white rounded-full mr-3">
                                <img src="https://img.icons8.com/ios-filled/100/ffffff/process.png" alt="process" />
                            </div>
                            <div class="flex flex-col justify-center">
                                <div class="text-lg text-black dark:text-white">{{ $proces }}</div>
                                <div class="text-sm text-gray-900 dark:text-gray-200">Diproses</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-8">
                <div class="w-full lg:w-1/4">
                    <div
                        class="widget w-full p-4 rounded-lg bg-gray-100 shadow-md dark:bg-gray-700 border-l-4 border-lime-700">
                        <div class="flex items-center">
                            <div class="icon w-14 p-3.5 bg-lime-700 text-white rounded-full mr-3">
                                <img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/100/ffffff/external-check-multimedia-kiranshastry-solid-kiranshastry.png"
                                    alt="external-check-multimedia-kiranshastry-solid-kiranshastry" />
                            </div>
                            <div class="flex flex-col justify-center">
                                <div class="text-lg text-black dark:text-white">{{ $ready }}</div>
                                <div class="text-sm text-gray-900 dark:text-gray-200">Pesanan Siap</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/4">
                    <div
                        class="widget w-full p-4 rounded-lg bg-gray-100 shadow-md dark:bg-gray-700 border-l-4 border-sky-700">
                        <div class="flex items-center">
                            <div class="icon w-14 p-3.5 bg-sky-700 text-white rounded-full mr-3">
                                <img src="https://img.icons8.com/ios-filled/100/ffffff/delivery--v1.png"
                                    alt="delivery--v1" />
                            </div>
                            <div class="flex flex-col justify-center">
                                <div class="text-lg text-black dark:text-white">{{ $send }}</div>
                                <div class="text-sm text-gray-900 dark:text-gray-200">Dikirim</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/4">
                    <div
                        class="widget w-full p-4 rounded-lg bg-gray-100 shadow-md dark:bg-gray-700 border-l-4 border-orange-700">
                        <div class="flex items-center">
                            <div class="icon w-14 p-3.5 bg-orange-700 text-white rounded-full mr-3">
                                <img src="https://img.icons8.com/ios-filled/100/ffffff/free-shipping.png"
                                    alt="free-shipping" />
                            </div>
                            <div class="flex flex-col justify-center">
                                <div class="text-lg text-black dark:text-white">{{ $free }}</div>
                                <div class="text-sm text-gray-900 dark:text-gray-200">Gratis Pengiriman</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/4">
                    <div
                        class="widget w-full p-4 rounded-lg bg-gray-100 shadow-md dark:bg-gray-700 border-l-4 border-stone-800">
                        <div class="flex items-center">
                            <div class="icon w-14 p-3.5 bg-stone-800 text-white rounded-full mr-3">
                                <img src="https://img.icons8.com/pastel-glyph/100/ffffff/shipping-service--v1.png"
                                    alt="shipping-service--v1" />
                            </div>
                            <div class="flex flex-col justify-center">
                                <div class="text-lg text-black dark:text-white">{{ $ekspedisi }}</div>
                                <div class="text-sm text-gray-900 dark:text-gray-200">Ekspedisi</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
