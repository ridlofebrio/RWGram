@extends('layouts.template')

@section('content')
    <header class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-left">
            <div class="flex items-center mb-4">
                <a href="{{ route('data.penduduk.request') }}" class="text-blue-main hover:text-blue-main mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5M12 5l-7 7 7 7" />
                    </svg>
                </a>
                <a href="{{ route('data.penduduk.request') }}">
                    <span class="text-blue-main text-md hover:text-blue-main">Data Diri</span>
                </a>
            </div>
            <h1 class="text-3xl font-bold tracking-tight text-neutral-10">Form Data Diri</h1>
            <p class="mt-2 text-base leading-6 text-neutral-10 max-w-xl">Silakan melihat data diri Anda, ya!</p>
        </div>
    </header>
    <main class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
        <div class="max-w-7xl mx-auto card p-8 mb-12" style="box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 10px;">
            <div class="sm:col-span-4">
                <label class="block text-sm font-medium leading-6 text-neutral-06">Nomor Kartu Keluarga</label>
                <div class="mt-1 mb-4">
                    <div class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3
                        text-neutral-10 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset
                        focus:ring-blue-600 sm:text-sm sm:leading-6" contenteditable="false">{{ $penduduk->kartukeluarga->NKK }}</div>
                </div>
            </div>
            <div class="sm:col-span-4">
                <label class="block text-sm font-medium leading-6 text-neutral-06">Nomor Identitas Kependudukan</label>
                <div class="mt-1 mb-4">
                    <div class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3
                        text-neutral-10 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset
                        focus:ring-blue-600 sm:text-sm sm:leading-6" contenteditable="false">{{ $penduduk->NIK }}</div>
                </div>
            </div>
            <div class="sm:col-span-4">
                <label class="block text-sm font-medium leading-6 text-neutral-06">Nama</label>
                <div class="mt-1 mb-4">
                    <div class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3
                        text-neutral-10 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset
                        focus:ring-blue-600 sm:text-sm sm:leading-6" contenteditable="false">{{ $penduduk->nama_penduduk }}</div>
                </div>
            </div>
            <div class="sm:col-span-4">
                <label class="block text-sm font-medium leading-6 text-neutral-06">Tempat Lahir</label>
                <div class="mt-1 mb-4">
                    <div class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3
                        text-neutral-10 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset
                        focus:ring-blue-600 sm:text-sm sm:leading-6" contenteditable="false">{{ $penduduk->tempat_lahir }}</div>
                </div>
            </div>
            <div class="sm:col-span-4">
                <label class="block text-sm font-medium leading-6 text-neutral-06">Tanggal Lahir</label>
                <div class="mt-1 mb-4">
                    <div class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3
                        text-neutral-10 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset
                        focus:ring-blue-600 sm:text-sm sm:leading-6" contenteditable="false" style="text-transform: capitalize;">
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $penduduk->tanggal_lahir)->locale('id')->isoFormat('D MMMM YYYY') }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-4">
                <label class="block text-sm font-medium leading-6 text-neutral-06">Jenis Kelamin</label>
                <div class="mt-1 mb-4">
                    <div class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3
                        text-neutral-10 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset
                        focus:ring-blue-600 sm:text-sm sm:leading-6" contenteditable="false" style="text-transform: capitalize;">
                        {{ $penduduk->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-4">
                <label class="block text-sm font-medium leading-6 text-neutral-06">Status Kawin</label>
                <div class="mt-1 mb-4">
                    <div class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3
                        text-neutral-10 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset
                        focus:ring-blue-600 sm:text-sm sm:leading-6" contenteditable="false" style="text-transform: capitalize;">{{ $penduduk->status_perkawinan }}</div>
                </div>
            </div>
            <div class="sm:col-span-4">
                <label class="block text-sm font-medium leading-6 text-neutral-06">Alamat</label>
                <div class="mt-1 mb-4">
                    <div class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3
                        text-neutral-10 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset
                        focus:ring-blue-600 sm:text-sm sm:leading-6" contenteditable="false">{{ $penduduk->alamat }}</div>
                </div>
            </div>
            <div class="sm:col-span-4">
                <label class="block text-sm font-medium leading-6 text-neutral-06">Golongan Darah</label>
                <div class="mt-1 mb-4">
                    <div class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3
                        text-neutral-10 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset
                        focus:ring-blue-600 sm:text-sm sm:leading-6" contenteditable="false" style="text-transform: uppercase;">{{ $penduduk->golongan_darah }}</div>
                </div>
            </div>
            <div class="sm:col-span-4">
                <label class="block text-sm font-medium leading-6 text-neutral-06">Agama</label>
                <div class="mt-1 mb-4">
                    <div class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3
                        text-neutral-10 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset
                        focus:ring-blue-600 sm:text-sm sm:leading-6" contenteditable="false" style="text-transform: capitalize;">{{ $penduduk->agama }}</div>
                </div>
            </div>
            <div class="sm:col-span-4">
                <label class="block text-sm font-medium leading-6 text-neutral-06">Pekerjaan</label>
                <div class="mt-1 mb-4">
                    <div class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3
                        text-neutral-10 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset
                        focus:ring-blue-600 sm:text-sm sm:leading-6" contenteditable="false" style="text-transform: capitalize;">{{ $penduduk->pekerjaan }}</div>
                </div>
            </div>
            <div class="sm:col-span-4">
                <label class="block text-sm font-medium leading-6 text-neutral-06">Status Tinggal</label>
                <div class="mt-1 mb-4">
                    <div class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3
                        text-neutral-10 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset
                        focus:ring-blue-600 sm:text-sm sm:leading-6" contenteditable="false" style="text-transform: capitalize;">{{ $penduduk->status_tinggal }}</div>
                </div>
            </div>
            <div class="sm:col-span-4">
                <label class="block text-sm font-medium leading-6 text-neutral-06">Status Meninggal</label>
                <div class="mt-1 mb-4">
                    <div class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3
                        text-neutral-10 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset
                        focus:ring-blue-600 sm:text-sm sm:leading-6" contenteditable="false">
                        {{ $penduduk->status_meninggal == 0 ? '-' : 'Meninggal' }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
