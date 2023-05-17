@extends('layouts.app-penulis')


@extends('penulis.sidebar')
@section('content-sidebar')
    <form action="{{ url('penulis/tulis-artikel') }}" method="post">
        @csrf
        @method('post')
        <div class="mb-6">
            <label required for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                Artikel</label>
            <input type="text" id="email" name="judul_artikel"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="Masukan Judul artikel" required>
        </div>
        <div class="my-3 bg-white rounded-t-lg dark:bg-gray-800">
            <label for="comment" class="sr-only">Isi Artikel</label>
            <textarea name="isi_artikel" id="comment" rows="4"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="tulis artikel mu" required></textarea>
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Upload
            Artikel
        </button>
    </form>
@endsection
