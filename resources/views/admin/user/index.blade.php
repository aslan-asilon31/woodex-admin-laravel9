@extends('admin.layouts.app')
@section('content')
    <section class="bg-light dark:bg-dark p-3 sm:p-5 sm:ml-64 lg:pt-24">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-4">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full">
                        <form action="/admin/user" method="get">
                            <label for="default-search"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <input type="search" name="search" id="default-search"
                                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    value="{{ request('search') }}">
                                <button type="submit"
                                    class="text-white absolute right-2.5 bottom-2.5 bg-five font-medium rounded-lg text-sm px-4 py-2">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
                @if ($users->count() != 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">No.</th>
                                    <th scope="col" class="px-4 py-3">Nama</th>
                                    <th scope="col" class="px-4 py-3">Email</th>
                                    <th scope="col" class="px-4 py-3">Tanggal Lahir</th>
                                    <th scope="col" class="px-4 py-3">Jenis Kelamin</th>
                                    <th scope="col" class="px-4 py-3">No. HP</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $loop->iteration }}</th>
                                        <td class="px-4 py-3">{{ $user->name }}</td>
                                        <td class="px-4 py-3">{{ $user->email }}</td>
                                        <td class="px-4 py-3">{{ $user->userData->dateborn ?? '' }}</td>
                                        <td class="px-4 py-3">{{ $user->userData->gender ?? '' }}</td>
                                        <td class="px-4 py-3">{{ $user->userData->phone_number ?? '' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                @else
                    <div class="py-8 px-4 mx-auto max-w-screen-md text-center lg:py-16 lg:px-12">
                        <img class="mx-auto mb-4 w-32 h-32" src="https://img.icons8.com/ios/100/ffffff/nothing-found.png"
                            alt="nothing-found" />
                        <h1
                            class="mb-4 text-xl font-bold tracking-tight leading-none text-gray-900 lg:mb-6 md:text-2xl xl:text-3xl dark:text-white">
                            Pelanggan Tidak Ditemukan</h1>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
