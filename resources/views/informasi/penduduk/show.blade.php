@extends('layouts.template')

@section('content')
    <header class="bg-white flex justify-center">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-right">
            <div class="flex items-center">
                <a href="{{ route('informasi.penduduk.index') }}" class="text-blue-main hover:text-blue-main mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5M12 5l-7 7 7 7" />
                    </svg>              
                </a>
                <a href="{{ route('informasi.penduduk.index') }}">
                    <span class="text-blue-main text-md hover:text-blue-main">Pengumuman</span>
                </a>
            </div>
        </div>                 
    </header>

    <div class="bg-white-100 mx-auto max-w-7xl px-4 py-2 sm:px-6 lg:px-8">        
        <img src="https://i.ibb.co/hX6pfms/img32.jpg" class="rounded-lg object-cover h-[420px] w-full mb-[24px]"/>
        <p class="mb-4 font-medium text-xl text-neutral-500 dark:text-white text-black">
            {{ $informasi->judul }}
        </p>       
        <p class="mb-4 font-medium text-sm text-gray-500 dark:text-gray-500">
            Diunggah pada {{ date('d F Y', strtotime($informasi->created_at)) }}
        </p>
        <div>
            <p class="mb-1 font-medium text-lg text-neutral-500 dark:text-white text-black">
                Deskripsi
            </p>  
            <p class="mb-4 font-small text-base text-neutral-500 dark:text-white text-black">
                {{ $informasi->deskripsi_informasi }}
            </p>  
        </div>
        <div>
            <p class="mb-1 font-medium text-lg text-neutral-500 dark:text-white text-black">
                Tanggal Pelaksanaan
            </p>  
            <p class="mb-4 font-small text-base text-neutral-500 dark:text-white text-black">
                {{ \Carbon\Carbon::parse($informasi->tanggal_informasi)->locale('id')->translatedFormat('l, j F Y') }}
            </p>              
        </div>
        <div>
            <p class="mb-1 font-medium text-lg text-neutral-500 dark:text-white text-black">
                Tempat
            </p>  
            <p class="mb-6 font-small text-base text-neutral-500 dark:text-white text-black">
                {{ ($informasi->lokasi_informasi) }}
            </p>              
        </div>
    </div>
@endsection
