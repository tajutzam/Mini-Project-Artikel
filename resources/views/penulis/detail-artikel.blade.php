@extends('layouts.app-penulis')


@extends('penulis.sidebar')


@section('content-sidebar')
    <h1 class="text-lg text-blue-700">Judul</h1>
    <p class="text-black italic underline">{{ $data->judul_artikel }}</p>
    <h1 class="text-lg text-blue-700">Isi Artikel</h1>
    <p class=" mb-3 text-black italic underline">{{ $data->isi_artikel }}</p>
    <p class="text-blue-600 italic">Komentar</p>
    @foreach ($data->detail as $item)
        <div class="border-l border-blue-300 h-5"></div>
        <div
            class="inline-block mb-2  p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-start">
                <span class="text-blue-500 italic">{{ $item->komentar->nama }}</span><span
                    class="ml-2 border-l border-blue-300 h-5"></span>
                <span class="text-gray-600 ml-2">{{ $item->komentar->isi_komentar }}</span>
            </div>
            <p class="text-gray-600 italic underline">{{ $item->komentar->created_at->format('Y-M-d h:m') }}</p>
        </div>
    @endforeach
@endsection
