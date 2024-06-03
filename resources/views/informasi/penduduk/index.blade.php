@extends('layouts.template')

@section('content')
    <header class="bg-white">
        <div class="mx-auto max-w-7xl px-8 py-12 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl font-extrabold text-neutral-10">Pengumuman</h1>
            <p class="mt-6 font-normal leading-6 text-neutral-10 max-w-4xl mx-auto">Informasi ini berisikan pengumuman
                mengenai kegiatan yang akan dilaksanakan di lingkungan RW.
                Kegiatan tersebut bertujuan untuk mempererat hubungan antarwarga, meningkatkan kebersamaan, serta
                meningkatkan kualitas lingkungan RW 04 Kalirejo.</p>
        </div>
    </header>

    <div class="bg-white mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="flex flex-col-reverse sm:flex-row gap-4 justify-between items-center mb-12">
            <h2 class="font-bold dark:text-white text-neutral-10 text-2xl">
                Pengumuman Terakhir
            </h2>
            <form action="{{ route('informasi.penduduk.index') }}" method="GET" class="flex items-center max-w-sm">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <input type="text" id="simple-search" name="search"
                        class="bg-neutral-02 border border-neutral-05 text-neutral-10 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full px-8 p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Cari Pengumuman..." />
                </div>
                <button type="submit"
                    class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-main rounded-lg border border-blue-main hover:bg-dodger-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-main dark:bg-blue-main dark:hover:bg-dodger-blue-800 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>
        </div>
        <div class="max-w-7xl mx-auto card p-8 mb-12"
            style="box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 10px;">
            <div class="grid grid-cols-1 gap-y-6 md:grid-cols-1 md:gap-x-6">
                @if ($informasi->isEmpty())
                    <p class="text-center text-xl text-neutral-06">Tidak ada pengumuman yang tersedia</p>
                @else
                    @foreach ($informasi as $info)
                        <a href="{{ route('informasi.penduduk.show', $info->informasi_id) }}" class="w-full h-full">
                            <div class="flex flex-col md:flex-row items-left hover:bg-neutral-03 p-6 rounded-lg">
                                <div class="shrink-0 mb-4 md:mb-0 md:mr-6">
                                    <img src="{{ $info->foto_informasi == null ? 'https://res.cloudinary.com/dtzlizlrs/image/upload/v1716897949/e7dulpy8h3y86sspr8o5.jpg' : $info->foto_informasi }}"
                                        class="rounded-lg object-cover h-[200px] w-[320px]" />
                                </div>
                                <div class="grow">
                                    <p
                                        class="mb-1 font-semibold text-lg text-neutral dark:text-white text-black line-clamp-2">
                                        {{ $info->judul }}
                                    </p>
                                    <p class="mb-3 text-base text-neutral-10 dark:text-white line-clamp-3">
                                        {{ $info->deskripsi_informasi }}
                                    </p>
                                    <div class="flex items-center dark:text-white mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-miterlimit="10" stroke-width="1.5"
                                                d="M8 2v3m8-3v3M3.5 9.09h17m.5-.59V17c0 3-1.5 5-5 5H8c-3.5 0-5-2-5-5V8.5c0-3 1.5-5 5-5h8c3.5 0 5 2 5 5Z" />
                                            <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M15.695 13.7h.009m-.009 3h.009m-3.709-3h.01m-.01 3h.01m-3.711-3h.01m-.01 3h.01" />
                                        </svg>
                                        <p class="ml-3 text-neutral-10 text-sm font-semibold line-clamp-1">
                                            {{ \Carbon\Carbon::parse($info->tanggal_informasi)->locale('id')->translatedFormat('l, j F Y') }}
                                        </p>
                                    </div>
                                    <div class="flex items-center dark:text-white mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="#1B1B1B" stroke-width="1.5"
                                                d="M12 13.43a3.12 3.12 0 1 0 0-6.24 3.12 3.12 0 0 0 0 6.24Z" />
                                            <path stroke="#1B1B1B" stroke-width="1.5"
                                                d="M3.62 8.49c1.97-8.66 14.8-8.65 16.76.01 1.15 5.08-2.01 9.38-4.78 12.04a5.193 5.193 0 0 1-7.21 0c-2.76-2.66-5.92-6.97-4.77-12.05Z" />
                                        </svg>
                                        <p class="ml-3 text-neutral-10 text-sm font-semibold line-clamp-1">
                                            {{ $info->lokasi_informasi }}</p>
                                    </div>

                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
