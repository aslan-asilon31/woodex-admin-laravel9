<nav
    class="bg-light px-2 sm:px-4 py-2.5 dark:bg-dark fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600" >
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="/" class="flex items-center">
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">
                <br>Woodex</span>
        </a>
        <div class="flex items-center lg:order-2">
            @if (Route::has('login'))
                @auth
                    {{-- <div class="mr-2">
                        <!-- Notifications -->
                        <button type="button" data-dropdown-toggle="notification-dropdown"
                            class="relative inline-flex items-center p-2 mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                            <span class="sr-only">Tampilkan Notifikasi</span>
                            @if (Auth::User()->unreadNotifications->count())
                                <!-- Bell icon -->
                                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                                    </path>
                                </svg>
                                <div
                                    class="absolute inline-flex items-center justify-center w-4 h-4 text-xs font-bold text-white bg-amber-500 border-2 border-white rounded-full -top-1 -right-1 dark:border-gray-900">
                                </div>
                            @else
                                <!-- Bell icon -->
                                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                                    </path>
                                </svg>
                            @endif
                        </button>
                        <!-- Dropdown menu -->
                        <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:divide-gray-600 dark:bg-gray-700"
                            id="notification-dropdown">
                            <div class="flex space-between">
                                <div
                                    class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    Notifikasi
                                </div>
                                <div
                                    class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400 hover:underline">
                                    <a href="{{ route('allRead') }}">Dibaca semua</a>
                                </div>
                            </div>
                            @foreach (Auth::User()->unreadNotifications as $notification)
                                <div>
                                    <a href="#"
                                        class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                                        <div class="flex-shrink-0">
                                            <img class="w-11 h-11 rounded-full"
                                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                                                alt="Bonnie Green avatar">
                                            <div
                                                class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 rounded-full border border-white bg-primary-700 dark:border-gray-700">
                                                <svg aria-hidden="true" class="w-3 h-3 text-white" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                                    </path>
                                                    <path
                                                        d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="pl-3 w-full">
                                            <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400">
                                                <span
                                                    class="font-semibold text-gray-900 dark:text-white">{{ $notification->data['user_create'] }}</span>:
                                                "{{ $notification->data['body'] }}"
                                            </div>
                                            <div class="text-xs font-medium text-gray-700 dark:text-gray-400">
                                                {{ $notification->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div> --}}
                    <div>
                        <!-- User -->
                        <div>
                            <button id="avatarButton" type="button" data-dropdown-toggle="userDropdown"
                                data-dropdown-placement="bottom-start"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 cursor-pointer"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <div class="relative w-6 h-6 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                    <svg class="absolute w-8 h-8 text-gray-400 -left-1" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </button>
                        </div>
                        <!-- Dropdown menu -->
                        <div id="userDropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                <div>{{ Auth::user()->name }}</div>
                            </div>
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                                <li>
                                    <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Pengaturan</x-nav-link>
                                </li>
                                <li>
                                    <x-nav-link :href="route('orders')" :active="request()->routeIs('orders')"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Pesanan</x-nav-link>
                                </li>
                                <li>
                                    <x-nav-link :href="route('fullCustoms')" :active="request()->routeIs('fullCustoms')"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Pesanan Full Custom
                                    </x-nav-link>
                                </li>
                            </ul>
                            <div class="py-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a href="route('logout')"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Keluar</a>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-4 py-2 lg:py-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Masuk</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-2 text-white bg-four font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0">Daftar</a>
                    @endif
                @endauth
            @endif
            <button id="theme-toggle" type="button"
                class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 ml-3">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>
            <div
                class="fixed bottom-0 left-0 z-50 w-full h-16 bg-light border-t border-gray-200 dark:bg-gray-700 dark:border-gray-600 lg:hidden md:hidden">
                <div class="grid h-full max-w-lg grid-cols-4 mx-auto">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" type="button"
                        class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <img class="w-6 h-6 mb-1" src="https://img.icons8.com/ios-filled/50/d97706/home.png"
                            alt="home">
                        <span
                            class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-amber-600 dark:group-hover:text-amber-500">Beranda</span>
                    </x-nav-link>
                    <x-nav-link :href="route('about')" :active="request()->routeIs('about')" type="button"
                        class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <img class="w-6 h-6 mb-1" src="https://img.icons8.com/ios-filled/50/d97706/info.png"
                            alt="info">
                        <span
                            class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-amber-600 dark:group-hover:text-amber-500">Tentang</span>
                    </x-nav-link>
                    <x-nav-link :href="route('products')" :active="request()->routeIs('products')" type="button"
                        class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <img class="w-6 h-6 mb-1"
                            src="https://img.icons8.com/external-basicons-solid-edtgraphics/50/d97706/external-block-ui-components-basicons-solid-edtgraphics-7.png"
                            alt="external-block-ui-components-basicons-solid-edtgraphics-7">
                        <span
                            class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-amber-600 dark:group-hover:text-amber-500">Katalog</span>
                    </x-nav-link>
                    <x-nav-link :href="route('custom_form')" :active="request()->routeIs('custom_form')" type="button"
                        class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                        <img class="w-6 h-6 mb-1"
                            src="https://img.icons8.com/external-sbts2018-solid-sbts2018/50/d97706/external-custom-basic-ui-elements-2.2-sbts2018-solid-sbts2018.png"
                            alt="external-custom-basic-ui-elements-2.2-sbts2018-solid-sbts2018">
                        <span
                            class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-amber-600 dark:group-hover:text-amber-500">Kustom</span>
                    </x-nav-link>
                </div>
            </div>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
            <ul
                class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-light dark:bg-gray-800 md:dark:bg-dark dark:border-gray-700">
                <li>
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')"
                        class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-yellow-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                        aria-current="page">Beranda</x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('about')" :active="request()->routeIs('about')"
                        class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-yellow-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Tentang
                        Kami</x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('products')" :active="request()->routeIs('products')"
                        class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-yellow-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Katalog</x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('custom_form')" :active="request()->routeIs('custom_form')"
                        class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-yellow-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Full
                        Kustom</x-nav-link>
                </li>
            </ul>
        </div>
    </div>
</nav>
