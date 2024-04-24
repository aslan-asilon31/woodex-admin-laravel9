@extends('layouts.app')
@section('content')
    <section class="bg-light dark:bg-dark pt-28 pb-20">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                Woodex
            </a>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <form method="POST" action="{{ route('login') }}" class="space-y-2 md:space-y-4">
                        @csrf
                        <div>
                            <label for="email"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autofocus>
                            @error('email')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                        class="font-medium">{{ $message }}</span>
                                </p>
                            @enderror
                        </div>
                        <div>
                            <label for="password"
                                class="block text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                            @error('password')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                        class="font-medium">{{ $message }}</span>
                                </p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                    name="remember">
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-300">Ingatkan saya</span>
                            </label>
                            @if (Route::has('password.request'))
                                <a class="text-sm text-gray-600 hover:underline dark:text-gray-100 dark:hover:underline rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('password.request') }}">
                                    {{ __('Lupa password ?') }}
                                </a>
                            @endif
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-third hover:bg-four font-medium rounded-lg text-sm px-5 py-2.5 text-center">Masuk</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Belum punya akun? <a href="{{ route('register') }}"
                                class="font-medium text-third hover:underline dark:text-second">Daftar disini</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
