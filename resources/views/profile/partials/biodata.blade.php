<section>
    <form action="/myprofil/update" method="post">
        @csrf
        <div class="mb-5">
            <label for="dateborn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                Lahir</label>
            <input type="date" name="dateborn" id="dateborn"
                value="{{ old('dateborn', Auth::user()->userData->dateborn ?? '') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500">
        </div>
        <div class="mb-5">
            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                Kelamin</label>
            <select name="gender" id="gender" value="{{ old('gender', Auth::user()->userData->gender ?? '') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500">
                <option value="Laki-laki" selected>Laki - laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="mb-5">
            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                HP</label>
            <input type="number" name="phone_number" id="phone_number"
                value="{{ old('phone_number', Auth::user()->userData->phone_number ?? '') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-amber-600 focus:border-amber-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500">
        </div>
        <div class="pt-5">
            <button type="submit"
                class="w-full text-white bg-third font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Simpan
            </button>
        </div>
    </form>
</section>
