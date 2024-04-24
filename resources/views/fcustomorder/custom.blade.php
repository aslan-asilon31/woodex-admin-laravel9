@extends('layouts.app')
@section('content')
    <section class="bg-light dark:bg-dark pt-24">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <div class="form_content bg-gray-50 border border-gray-600 dark:bg-gray-900">
                <h4 class="font-bold text-center text-4xl text-gray-900 dark:text-white mb-10">Form Kustom</h4>
                <form action="/fullcustom/add" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-5">
                        <div class="col-30">
                            <label for="nama" class="font-semibold text-gray-900 dark:text-white">Nama
                                Lengkap</label>
                        </div>
                        <div class="col-70">
                            <input type="text" id="nama" name="nama" value="{{ Auth::user()->name ?? '' }}"
                                class="rounded-md border-gray-400 text-gray-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white outline-none">
                            @error('nama')
                                <div class="flex p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                                    role="alert">
                                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <div>
                                        <span class="font-medium">{{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class=" row mb-5">
                        <div class="col-30">
                            <label for="phone_number" class="font-semibold text-gray-900 dark:text-white">No.
                                HP</label>
                        </div>
                        <div class="col-70">
                            <input type="number" id="phone_number" name="phone_number"
                                value="{{ old('phone_number', Auth::user()->userData->phone_number ?? '') }}"
                                class="rounded-md border-gray-400 text-gray-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white outline-none">
                            @error('phone_number')
                                <div class="flex p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                                    role="alert">
                                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <div>
                                        <span class="font-medium">{{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-30">
                            <label for="description" class="font-semibold text-gray-900 dark:text-white">Deskripsi</label>
                        </div>
                        <div class="col-70">
                            <textarea id="description" name="description" rows="4" value="{{ old('description') }}"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-md border border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                            @error('description')
                                <div class="flex p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                                    role="alert">
                                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <div>
                                        <span class="font-medium">{{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-30">
                            <label for="image_custom" class="font-semibold text-gray-900 dark:text-white">Gambar
                        </div>
                        <div class="col-70">
                            <img class="mb-3 img-preview img-fluid w-full h-auto col-sm-5">
                            <input name="image_custom" id="image_custom" onchange="previewImage()"
                                @error('image_custom') is-invalid @enderror
                                class="block w-full px-2 m-0 text-sm font-normal transition ease-in-out border-solid form-control bg-clip-padding focus:text-gray-700 focus:bg-white focus:border-blue-600 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600"
                                id="formFileSm" type="file">
                            @error('image_custom')
                                <div class="text-base text-red-500">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mx-auto">
                        <button type="submit"
                            class="px-2 py-2 w-full bg-third text-center rounded-md text-white text-sm font-bold">Kirim</button>
                    </div>
                    <div id="text-info"></div>
                </form>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        //fungsi penampil gambar
        function previewImage() {
            const image = document.querySelector('#image_custom');
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
