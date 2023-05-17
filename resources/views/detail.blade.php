@extends('layouts.app-second')

@section('content')
    <div class="flex justify-between">

        <h5 class="mb-4  font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl  dark:text-white">Detail <mark
                class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">Artikel</h1>

    </div>

    <h3 class="mb-3 text-blue-500 text-bold text-md-left">Judul Artikel</h3>
    <p class="mb-3 text-gray-500 dark:text-gray-400 underline italic">{{ $data->judul_artikel }}.</p>
    <h3 class="mb-3 text-blue-500 text-bold text-md-left">Penulis</h3>
    <p class="mb-3 text-gray-500 dark:text-gray-400 w-96">{{ $data->penulis->name }} <em class="font-italic"></p>
    <h3 class="mb-3 text-blue-500 text-bold text-md-left">Isi Artikel</h3>
    <p class="mb-3 text-gray-500 dark:text-gray-400 w-96">{{ $data->isi_artikel }} <em class="font-italic"></p>

    <h2>Berikan Komentarmu</h2>
    <div class="border-l border-blue-300 h-5"></div>

    <form class="form-control w-96" action="{{ url('detail/addkoment') }}" method="post">
        @csrf

        <input type="text" name="id_artikel" value="{{ $data->id }}" hidden>
        <div class="">
            <label for="success" class="block mb-2 text-sm font-medium text-blue-700 dark:text-green-500">Nama mu</label>
            <input required type="text" name="nama" id="small-input"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="masukan namamu">
        </div>
        <div class="">
            <label for="success" class="block mb-2 text-sm font-medium text-blue-700 dark:text-green-500">Email mu</label>
            <input required type="email" name="email" id="small-input"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="masukan Email">
        </div>
        <div class="border-l border-blue-300 h-5"></div>
        <div>
            <label for="error" class="block mb-2 text-sm font-medium text-blue-700 dark:text-red-500">Komentar Mu</label>
            <textarea required type="text" name="komentar" id="small-input"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="masukan Komentar"></textarea>
        </div>
        <div class="border-l border-blue-300 h-5"></div>
        <button type="submit"
            class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kirim</button>
    </form>

    <h3>Daftar Komentar</h3>

    <div class="">
        @foreach ($data->detail as $item)
            <div>
                <div class="border-l border-blue-300 h-5"></div>
                <a href="#"
                    class="hover:bg-blue-200 block w-full max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $item->komentar->nama }}
                    </h5>
                    <p class="font-serif text-gray-700 dark:text-gray-400">{{ $item->komentar->isi_komentar }}</p>
                    <div class="flex items-center mt-4">
                        <div class="ml-2">
                            <span class="text-sm font-medium text-gray-700">{{ $item->komentar->penulis }}</span>
                            <span class="text-xs text-gray-500">{{ $item->komentar->created_at }}</span>
                        </div>
                    </div>
                </a>

            </div>
        @endforeach
    </div>
@endsection
