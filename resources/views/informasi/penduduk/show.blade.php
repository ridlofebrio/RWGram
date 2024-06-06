@extends('layouts.template')

@section('content')
    <header class="bg-white flex justify-center">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-center">
            <div class="flex items-center group">
                <a href="{{ route('informasi.penduduk.index') }}"
                    class="text-blue-main hover:text-blue-main mr-2 group-hover:text-dodger-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5M12 5l-7 7 7 7" />
                    </svg>
                </a>
                <a href="{{ route('informasi.penduduk.index') }}">
                    <span
                        class="text-blue-main text-base font-medium hover:text-dodger-blue-800 group-hover:text-dodger-blue-800">Pengumuman</span>
                </a>
            </div>
        </div>
    </header>
    <div class="bg-white mx-auto max-w-7xl px-4  sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto card p-8 mb-12"
            style="box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 10px;">
            <img src="{{ $informasi->foto_informasi == null ? 'https://res.cloudinary.com/dtzlizlrs/image/upload/v1716897949/e7dulpy8h3y86sspr8o5.jpg' : $informasi->foto_informasi }}"
                class="rounded-lg object-cover h-[420px] w-full mb-[24px]" />
            <p class="mb-2 font-bold text-3xl text-neutral-10 dark:text-white">
                {{ $informasi->judul }}
            </p>
            <p class="mb-6 font-medium text-sm text-neutral-06 dark:text-gray-500">
                Diunggah pada
                {{ \Carbon\Carbon::parse($informasi->created_at)->locale('id')->translatedFormat('l, j F Y') }}

            </p>
            <div>
                <p class="mb-2 font-bold text-base text-neutral-10 dark:text-white">
                    Deskripsi
                </p>
                <p class="mb-6 text-base text-neutral-10 dark:text-white">
                    {{ $informasi->deskripsi_informasi }}
                </p>
            </div>
            <div>
                <p class="mb-2 font-bold text-base text-neutral-10 dark:text-white">
                    Tanggal Pelaksanaan
                </p>
                <p class="mb-6 text-base text-neutral-10 dark:text-white">
                    {{ \Carbon\Carbon::parse($informasi->tanggal_informasi)->locale('id')->translatedFormat('l, j F Y') }}
                </p>
            </div>
            <div>
                <p class="mb-2 font-bold text-base text-neutral-10 dark:text-white">
                    Tempat
                </p>
                <p class="mb-6 text-base text-neutral-10 dark:text-white">
                    {{ $informasi->lokasi_informasi }}
                </p>
            </div>
        </div>
    </div>
@endsection
