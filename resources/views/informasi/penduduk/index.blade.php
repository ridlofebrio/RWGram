@extends('layouts.template')

@section('content')
    <header class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Pengumuman</h1>
            <p class="mt-1 text-sm leading-6 text-gray-600 max-w-xl mx-auto">Informasi ini berisikan pengumuman mengenai kegiatan yang akan dilaksanakan di lingkungan RW. 
                Kegiatan tersebut bertujuan untuk mempererat hubungan antarwarga, meningkatkan kebersamaan, serta meningkatkan kualitas lingkungan RW.</p>
        </div>
    </header>

    <div class="bg-white-100 mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h2 class="mt-2 mb-6 pt-2 font-semibold  dark:text-white text-black text-2xl">
            Pengumuman Terakhir
        </h2>
        @foreach ($informasi as $info)
            <div class="mb-6 flex items-center">
                {{-- <a href="{{ route('informasi.show', $info->informasi_id) }}" class="w-full h-full"> --}}
                    <div class="shrink-0">
                        <img src="https://i.ibb.co/hX6pfms/img32.jpg" class="mr-3 rounded-lg" style="width: 200px"
                            alt="Generic placeholder image" />
                    </div>
                    <div class="ml-3 grow">
                        <p class="mb-1 font-medium  dark:text-white text-black">
                            {{ $info->judul }}
                        </p>

                        <p class="text-sm text-neutral-500 dark:text-white text-black">
                            {{ $info->deskripsi_informasi }}
                        </p>
                        <div class="flex items-center mt-1 text-sm text-gray-500 dark:text-white">
                            <svg class="w-4 h-4 mr-1 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 0C6.657 0 4 2.657 4 6c0 1.09.335 2.112.908 2.973l4.488 7.485a1 1 0 001.624 0l4.488-7.485c.573-.861.908-1.883.908-2.973 0-3.343-2.657-6-6-6zM6.687 7.999c-.926 0-1.687-.76-1.687-1.698C5 5.291 6.025 4 7.333 4s1.688 1.292 1.688 2.301c0 .937-.76 1.698-1.688 1.698zm0 1.906c1.044 0 1.688.713 1.688 1.698C8.375 14.709 7.349 16 6.02 16 4.707 16 4 15.285 4 14.205c0-.985.645-1.698 1.688-1.698zM13.326 10a.67.67 0 00-.654.678.67.67 0 001.308 0 .67.67 0 00-.654-.678zM10 10a.67.67 0 00-.654.678.67.67 0 001.308 0 .67.67 0 00-.654-.678zM6.674 10a.67.67 0 00-.653.678.67.67 0 101.308 0 .67.67 0 00-.655-.678z" clip-rule="evenodd"/>
                            </svg>
                            {{ $info->lokasi_informasi }}
                        </div>                               
                        <div class="flex items-center mt-1 text-sm text-gray-500 dark:text-white">
                            <svg class="w-4 h-4 mr-1 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M15.5556 2.77778H14.4444V0H13.3333V2.77778H6.66667V0H5.55556V2.77778H4.44444V0H3.33333V2.77778H1.66667C0.75 2.77778 0 3.52778 0 4.44444V17.2222C0 18.1389 0.75 18.8889 1.66667 18.8889H15.5556C16.4722 18.8889 17.2222 18.1389 17.2222 17.2222V4.44444C17.2222 3.52778 16.4722 2.77778 15.5556 2.77778ZM15.5556 17.2222H1.66667V7.5H15.5556V17.2222ZM2.77778 11.1111H4.44444V12.2222H2.77778V11.1111ZM2.77778 9.44444H4.44444V10.5556H2.77778V9.44444ZM2.77778 7.77778H4.44444V8.88889H2.77778V7.77778ZM5.55556 11.1111H7.22222V12.2222H5.55556V11.1111ZM5.55556 9.44444H7.22222V10.5556H5.55556V9.44444ZM5.55556 7.77778H7.22222V8.88889H5.55556V7.77778ZM8.33333 11.1111H10V12.2222H8.33333V11.1111ZM8.33333 9.44444H10V10.5556H8.33333V9.44444ZM8.33333 7.77778H10V8.88889H8.33333V7.77778ZM13.8889 11.1111H15.5556V12.2222H13.8889V11.1111ZM13.8889 9.44444H15.5556V10.5556H13.8889V9.44444ZM13.8889 7.77778H15.5556V8.88889H13.8889V7.77778Z"></path>
                            </svg>
                            {{ $info->tanggal_informasi }}
                        </div>                    
                    </div>
                {{-- </a> --}}
            </div>
        @endforeach               
    </div>
@endsection
