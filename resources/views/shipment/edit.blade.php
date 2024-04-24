@extends('layouts.app')
@section('content')
    <section class="bg-light dark:bg-dark pt-36 pb-20">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                Edit Data Alamat
            </a>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <form method="POST" action="/settings/address/{{ $shipment->id }}" class="space-y-4 md:space-y-6">
                        @method('put')
                        @csrf
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Penerima</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $shipment->name) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                autofocus>
                            @error('name')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                        class="font-medium">{{ $message }}</span>
                                </p>
                            @enderror
                        </div>
                        <div>
                            <label for="phone_number"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. HP</label>
                            <input type="number" name="phone_number" id="phone_number"
                                value="{{ old('phone_number', $shipment->phone_number) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('phone_number')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                        class="font-medium">{{ $message }}</span>
                                </p>
                            @enderror
                        </div>
                        <div>
                            <label for="address"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <textarea type="text" name="address" id="address" rows="4"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('address', $shipment->address) }}</textarea>
                            @error('address')
                                <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                        class="font-medium">{{ $message }}</span>
                                </p>
                            @enderror
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-third hover:bg-four font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
