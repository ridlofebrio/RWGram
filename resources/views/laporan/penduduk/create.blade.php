@extends('layouts.template')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <header class="bg-white">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-left">
                <div class="flex items-center mb-4">
                    <a href="{{ route('hidup.penduduk.request') }}" class="text-blue-main hover:text-blue-main mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5M12 5l-7 7 7 7" />
                        </svg>              
                    </a>
                    <a href="{{ route('laporan.penduduk.index') }}">
                        <span class="text-blue-main text-md hover:text-blue-main">Halaman Pengaduan</span>
                    </a>
                </div>
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Form Pengaduan Masyarakat</h1>
                <p class="mt-2 text-base leading-6 text-gray-600 max-w-xl">Silakan mengisi form pengaduan dengan benar, ya!</p>
            </div>                
        </header>
        <div class="container mx-auto">
            @if ($message = Session::get('error'))
                <div id="alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-auto w-1/2" role="alert">
                    <strong class="font-bold">Ops!</strong>
                    <span class="block sm:inline">{{ $message }}</span>
                    <!-- Tombol Close -->
                    <span id="close-btn" class="absolute top-0 right-0 px-2 py-1 cursor-pointer">&times;</span>
                </div>
            @endif
        </div>
        <main class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <!-- Your content -->        
            <div class="max-w-7xl mx-auto card p-8 mb-12" style="box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="sm:col-span-4">
                        <label for="NIK-pengaju" class="block text-sm font-medium leading-6 text-gray-900">NIK Anda</label>
                        <div class="mt-1 mb-4">
                            <input id="NIK-pengaju" name="NIK_pengaju" type="text" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3 
                                text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset 
                                focus:ring-blue-600 sm:text-sm sm:leading-6 " placeholder="Masukkan Nomor Induk Anda" value="{{ old('NIK-pengaju') }}">
                            @error('NIK-pengaju')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="nama_pengaju" class="block text-sm font-medium leading-6 text-gray-900">Nama Anda</label>
                        <div class="mt-1 mb-4">
                            <input id="nama_pengaju" name="nama_pengaju" type="text" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3 
                                text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset 
                                focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Masukkan Nama Anda" value="{{ old('nama_pengaju') }}">
                            @error('nama_pengaju')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="jenis_keluhan" class="block text-sm font-medium leading-6 text-gray-900">Jenis Keluhan</label>
                        <div class="mt-1 mb-4">
                            <input id="jenis_keluhan" name="jenis_keluhan" type="text" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3 
                                text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset 
                                focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Masukkan Nama Anda" value="{{ old('jenis_keluhan') }}">
                            @error('jenis_keluhan')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="deskripsi" class="block text-sm font-medium leading-6 text-gray-900">Deskripsi Laporan</label>
                        <div class="mt-1 mb-4">
                            <input id="deskripsi" name="deskripsi" type="text" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3 
                                text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset 
                                focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Masukkan deskripsi Anda" value="{{ old('deskripsi') }}">
                            @error('deskripsi')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror    
                        </div>
                    </div>
                    {{-- <div class="card-body">
                        <label>Drag and Drop Multiple Images (JPG, JPEG, PNG, .webp)</label>
                        <div class="dropzone" id="myDragAndDropUploader"></div>
                        <h5 id="message"></h5>
                    </div> --}}
                    <div class="flex items-center mt-6">
                        <input id="agree" type="checkbox" class="form-checkbox h-4 w-4 text-blue-600" />
                        <label for="agree" class="ml-2 block text-sm text-gray-900">
                            Apakah data Anda sudah benar?
                        </label>    
                    </div>
                    <div class="flex justify-center mt-12">
                        <button type="button" class="text-blue-main bg-grey hover:bg-blue-main hover:text-white hover:border-blue-main 
                        border border-blue-main px-20 py-1 text-base font-small rounded-full mr-8" onclick="resetForm()">Batal</button>
                        <button type="submit" id="submitBtn" disabled
                            class="text-white bg-gray-400 px-20 py-1 text-base font-small rounded-full">Kirim</button>
                    </div>
                </form>
            </div>
        </main>
        <script>
        let closeBtn = document.getElementById('close-btn');
        let agreeCheckbox = document.getElementById('agree');
        let submitBtn = document.getElementById('submitBtn');

        agreeCheckbox.addEventListener('change', function() {
            if (this.checked) {
                submitBtn.disabled = false;
                submitBtn.classList.remove('bg-gray-400');
                submitBtn.classList.add('bg-blue-main');
            } else {
                submitBtn.disabled = true;
                submitBtn.classList.remove('bg-blue-main');
                submitBtn.classList.add('bg-gray-400');
            }
        });

        function resetForm() {
            // Reset nilai input
            document.getElementById("NIK-pengaju").value = ""; 
            document.getElementById("jenis_keluhan").value = "";
            document.getElementById("deskripsi").value = "";
            document.getElementById("nama_pengaju").value = "";
            agreeCheckbox.checked = false; // Uncheck checkbox
            submitBtn.disabled = true; // Disable tombol Kirim
            submitBtn.classList.remove('bg-blue-main'); // Hapus warna latar belakang tombol Kirim
            submitBtn.classList.add('bg-gray-400'); // Tambahkan warna latar belakang abu-abu pada tombol Kirim
        }
        </script>
@endsection