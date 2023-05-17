@extends('layouts.app-penulis')


@extends('penulis.sidebar')

@section('content-sidebar')
    <div class="mb-4 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Jumlah Artikel</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $data[0]->artikel->count() }}</p>
    </div>

    <h3 class="mb-5 text-body">Daftar Artikel</h3>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach ($data[0]->artikel as $item)
            <div
                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5
                        class="mb-2 text-2xl font-bold tracking-tight text-gray-900 line-clamp-3 dark:text-white overflow-hidden overflow-ellipsis">
                        {{ $item->judul_artikel }}</h5>
                </a>
                <p class="mb-3 font-serif text-gray-600">{{ $item->isi_artikel }}.</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Jumlah Komentar . <span
                        class="text-blue-600 italic underline">{{ $item->detail->count() }}</span>.</p>
                <div class="flex justify-start">
                    <button id="artikel-edit" data-modal-target="edit-artikel" data-modal-toggle="edit-artikel"
                        data-id-artikel="{{ $item->id }}" data-judul-artikel="{{ $item->judul_artikel }}"
                        data-isi-artikel="{{ $item->isi_artikel }}" type="button"
                        class="py-2.5 px-5 mr-2 mb-2 h-full text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Edit
                    </button>
                    <form action="{{ url('penulis/detail/delete') }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="text" name="id_artikel" value="{{ $item->id }}" hidden>
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="submit"
                            class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Delete
                        </button>
                    </form>
                </div>
                <a href="{{ url('/penulis/detail/' . $item->id) }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Lihat Daftar Komentar
                </a>
            </div>
        @endforeach
    </div>



    <!-- Main modal -->
    <div id="edit-artikel" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="edit-artikel">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit Artikel</h3>
                    <form class="space-y-6" action="{{url("penulis/edit-artikel")}}" method="POST">
                        @csrf
                        @method("post")
                        <input type="text" name="id_artikel" id="id_artikel" hidden>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                                Artikel</label>
                            <input type="text" name="judul_artikel" id="judul_artikel"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Judul artikel" required>
                        </div>
                        <label for="isi_artikel" class="block  text-sm font-medium text-gray-900 dark:text-white">Isi
                            Artikel</label>
                        <textarea required name="isi_artikel" id="isi_artikel" rows="4"
                            class="block  w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Isi Artikel mu disini"></textarea>
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan
                            perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on("click", "#artikel-edit", function() {
            var idArtikel = $(this).data('id-artikel');
            var judul_artikel = $(this).data("judul-artikel");
            var isi_artikel = $(this).data("isi-artikel");
            console.log(idArtikel);
            console.log(judul_artikel);
            $("#id_artikel").val(idArtikel);
            $("#judul_artikel").val(judul_artikel);
            $("#isi_artikel").val(isi_artikel);
        });
    </script>
@endsection
