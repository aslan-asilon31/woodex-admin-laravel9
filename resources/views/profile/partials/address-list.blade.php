<section>
    <div class="flex flex-col md:flex-row items-center justify-center mb-16">
        <div
            class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
            <button type="button" id="addressAddButton" data-modal-toggle="addressAdd"
                class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-third">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Tambah Alamat
            </button>
            <div id="addressAdd" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                        <!-- Modal header -->
                        <div
                            class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Tambah Data Alamat
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="addressAdd">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form action="/settings/address/add" method="post">
                            @csrf
                            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                <div class="sm:col-span-2">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                        Penerima</label>
                                    <input type="text" name="name" id="name"
                                        value="{{ old('name', Auth::user()->name) }}"
                                        class="@error('name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                                        required autofocus>
                                    @error('name')
                                        <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                                class="font-medium">{{ $message }}</span>
                                        </p>
                                    @enderror
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="phone_number"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                                        HP</label>
                                    <input type="number" name="phone_number" id="phone_number"
                                        value="{{ old('phone_number', Auth::user()->userData->phone_number ?? '') }}"
                                        class="@error('phone_number') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                                        required>
                                    @error('phone_number')
                                        <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                                class="font-medium">{{ $message }}</span>
                                        </p>
                                    @enderror
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="address"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                    <textarea id="address" name="address" rows="4"
                                        value="{{ old('address', Auth::user()->userData->address ?? '') }}"
                                        class="@error('address') is-invalid @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                                        required>{{ old('address') }}</textarea>
                                    @error('address')
                                        <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                                class="font-medium">{{ $message }}</span>
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit"
                                class="text-white inline-flex items-center bg-third font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($shipments->count() != 0)
        <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-3">
            @foreach ($shipments as $shipment)
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-700 dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $shipment->name }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $shipment->phone_number }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 w-full">{{ $shipment->address }}</p>
                    <div class="flex items-center space-x-4">
                        <a href="/settings/address/edit/{{ $shipment->id }}" type="button"
                            class="text-white inline-flex items-center bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">
                            Edit
                        </a>
                        <form action="/settings/address/delete/{{ $shipment->id }}" method="post">
                            @method('delete')
                            @csrf
                            <a href="/settings/address/delete/{{ $shipment->id }}" data-confirm-delete=true
                                type="button"
                                class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                Hapus
                            </a>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <figure class="max-w-lg mx-auto">
            <img class="mx-auto" width="100" height="100"
                src="https://img.icons8.com/ios-filled/100/C0C0C0/address--v1.png" alt="address--v1">
            <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">
                Data Alamat Masih Kosong</figcaption>
        </figure>
    @endif
</section>
