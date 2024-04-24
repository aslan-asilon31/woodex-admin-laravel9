<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2">
            <li>
            <li>
                <x-side-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="https://img.icons8.com/material/24/C5C5C5/dashboard-layout.png" class="w-6 h-6"
                        alt="icon dashboard">
                    <span class="ml-3">Dashboard</span>
                </x-side-link>
            </li>
            <li>
                <x-side-link :href="route('user')" :active="request()->routeIs('user')"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="https://img.icons8.com/external-tanah-basah-glyph-tanah-basah/48/c5c5c5/external-customer-advertisement-tanah-basah-glyph-tanah-basah.png"
                        class="w-6 h-6" alt="icon pelanggan">
                    <span class="ml-3">Pelanggan</span>
                </x-side-link>
            </li>
            <li>
                <x-side-link :href="route('incoming')" :active="request()->routeIs('incoming')"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="https://img.icons8.com/ios-filled/24/C5C5C5/create-order--v1.png" class="w-6 h-6"
                        alt="icon pelanggan">
                    <span class="ml-3">Pesanan Masuk</span>
                    <?php
                    $pesanan_1 = \App\Models\Order::where('status', '1')
                        ->where('order_status', 'Menunggu Konfirmasi')
                        ->where('evidencetf', '!=', null)
                        ->count();
                    $pesanan_2 = \App\Models\Order::where('status', '1')
                        ->where('order_status', 'Menunggu Konfirmasi')
                        ->where('payment_option', 'Lunas')
                        ->count();
                    ?>
                    @if (!empty($pesanan_1))
                        <span
                            class="inline-flex items-center justify-center w-5 h-5 ml-4 text-xs font-semibold text-white bg-red-500 rounded-full">
                            {{ $pesanan_1 }}
                        </span>
                    @elseif (!empty($pesanan_2))
                        <span
                            class="inline-flex items-center justify-center w-5 h-5 ml-4 text-xs font-semibold text-white bg-red-500 rounded-full">
                            {{ $pesanan_2 }}
                        </span>
                    @endif
                </x-side-link>
            </li>
            <li>
                <x-side-link :href="route('all')" :active="request()->routeIs('all')"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="https://img.icons8.com/ios-filled/50/c5c5c5/online-maintenance-portal.png" class="w-6 h-6"
                        alt="icon pesanan custom" />
                    <span class="ml-3">Pesanan Katalog</span>
                    <?php
                    $pesanan = \App\Models\Order::where('status', '1')
                        ->where('payment_status', 'DP')
                        ->where('evidencetf2', '!=', null)
                        ->count();
                    ?>
                    @if (!empty($pesanan))
                        <span
                            class="inline-flex items-center justify-center w-5 h-5 ml-4 text-xs font-semibold text-white bg-amber-500 rounded-full">
                            {{ $pesanan }}
                        </span>
                    @endif
                </x-side-link>
            </li>
            <li>
                <x-side-link :href="route('full')" :active="request()->routeIs('full')"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="https://img.icons8.com/ios-filled/50/c5c5c5/windows10-personalization.png" class="w-6 h-6"
                        alt="icon pesanan full custom" />
                    <span class="ml-3">Pesanan Full Custom</span>
                </x-side-link>
            </li>
            <li>
                <x-side-link :href="route('product.index')" :active="request()->routeIs('product.index')"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="https://img.icons8.com/external-basicons-solid-edtgraphics/50/c5c5c5/external-block-ui-components-basicons-solid-edtgraphics-7.png"
                        class="w-6 h-6" alt="icon katalog">
                    <span class="ml-3">Produk</span>
                </x-side-link>
            </li>
            <li>
                <x-side-link :href="route('category.index')" :active="request()->routeIs('category.index')"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img src="https://img.icons8.com/ios-filled/50/c5c5c5/category.png" class="w-6 h-6"
                        alt="icon kategori">
                    <span class="ml-3">Kategori</span>
                </x-side-link>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-side-link href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                this.closest('form').submit();"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"
                        role="menuitem"><img src="https://img.icons8.com/ios-filled/50/c5c5c5/exit.png" class="w-6 h-6"
                            alt="icon keluar">
                        <span class="ml-3">Keluar</span>
                    </x-side-link>
                </form>
            </li>
        </ul>
    </div>
</aside>
