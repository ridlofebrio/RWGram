@extends('layouts.template')

@section('content')
    <header class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-left">
            <div class="flex items-center mb-4">
                <a href="{{ route('bansos.penduduk.request') }}" class="text-blue-main hover:text-blue-main mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5M12 5l-7 7 7 7" />
                    </svg>              
                </a>
                <a href="{{ route('bansos.penduduk.request') }}">
                    <span class="text-blue-main text-md hover:text-blue-main">Permohonan Bantuan Sosial</span>
                </a>
            </div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Form Permohonan Bantuan Sosial</h1>
            <p class="mt-2 text-base leading-6 text-gray-600 max-w-xl">Silakan mengisi form permohonan bantuan sosial dengan benar, ya!</p>
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
            <form action="{{ route('bansos.penduduk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="sm:col-span-4">
                    <label for="nomer_kk" class="block text-sm font-medium leading-6 text-gray-900">Nomor Kartu Keluarga Anda</label>
                    <div class="mt-1 mb-4">
                        <input id="nomer_kk" name="nomer_kk" type="text" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3 
                            text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset 
                            focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Masukkan Nomor Kartu Keluarga Anda" value="{{ old('nomer_kk') }}">
                        @error('nomer_kk')
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
                @php
                    $count = 0;
                @endphp

                @foreach ($kriteria as $item)
                    @php
                        $count++;
                    @endphp
                    <div class="sm:col-span-4">
                        <label for="c.$count" class="block text-sm font-medium leading-6 text-gray-900">{{ $item->nama_kriteria }}</label>
                        <div class="mt-1 mb-4">
                            <input id="c{{ $count }}" name="c{{ $count }}" type="text" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3 
                                text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset 
                                focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Masukkan {{ $item->nama_kriteria }} Anda" value="{{ old('c'.$count) }}">
                            @error("c{$count}")
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror    
                        </div>
                    </div>
                @endforeach
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

    <script type="text/javascript">
        let closeBtn = document.getElementById('close-btn');
        let agreeCheckbox = document.getElementById('agree');
        let submitBtn = document.getElementById('submitBtn');

        function resetForm() {
            // Reset nilai input
            document.getElementById("nomer_kk").value = ""; 
            document.getElementById("nama_pengaju").value = "";
            document.getElementById("c1").value = "";
            document.getElementById("c2").value = "";
            document.getElementById("c3").value = "";
            document.getElementById("c4").value = "";
            document.getElementById("c5").value = "";
            document.getElementById("c6").value = "";
            agreeCheckbox.checked = false; // Uncheck checkbox
            submitBtn.disabled = true; // Disable tombol Kirim
            submitBtn.classList.remove('bg-blue-main'); // Hapus warna latar belakang tombol Kirim
            submitBtn.classList.add('bg-gray-400'); // Tambahkan warna latar belakang abu-abu pada tombol Kirim
        }

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

        // Fungsi untuk menyembunyikan alert setelah 3 detik
        function hideAlert() {
            let alert = document.getElementById('alert');
            alert.style.display = 'none';
        }

        closeBtn.addEventListener('click', function() {
            hideAlert();
        });

        setTimeout(hideAlert, 5000);
    </script>
@endsection
