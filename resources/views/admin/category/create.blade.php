@extends('admin.layouts.app')
@section('content')
    <section class="bg-light dark:bg-dark pt-24 p-3 sm:p-5 sm:ml-64 lg:pt-24">
        <div class="py-8 px-4 mx-auto w-full">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Kategori</h2>
            <form action="/admin/category" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required autofocus>
                        @error('name')
                            <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                    class="font-medium">{{ $message }}</span>
                            </p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="slug"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required>
                        @error('slug')
                            <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                    class="font-medium">{{ $message }}</span>
                            </p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="category_image"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar Kategori</label>
                        <img class="h-auto max-w-md img-preview">
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="category_image" name="category_image" type="file" class="form-control-file"
                            onchange="previewImage()">
                        @error('category_image')
                            <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-third rounded-lg">
                    Tambah
                </button>
            </form>
        </div>
    </section>

    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/admin/category/checkSlug??name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        function previewImage() {
            const image = document.querySelector('#category_image');
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
