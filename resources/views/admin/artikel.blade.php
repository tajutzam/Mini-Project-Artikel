@extends('layouts.app')

@section('content')
    {{-- cerita --}}

    <h4 class="text-bold mb-9">Daftar Artikel</h4>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-grey-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 border-b">Judul Artikel</th>
                    <th scope="col" class="px-6 py-3 border-b">Isi Artikel</th>
                    <th scope="col" class="px-6 py-3 border-b">Penulis</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($data as $item)
                    <tr>
                        <td class="pl-5 border-b">{{ $item['judul_artikel'] }}</td>
                        <td class="pl-5 border-b">{{ $item['isi_artikel'] }}</td>
                        <td class="pl-5 border-b">{{ $item->penulis->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
