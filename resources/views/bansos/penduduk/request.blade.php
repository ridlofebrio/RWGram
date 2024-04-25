@extends('layouts.template')

@section('content')
    <header class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Bantuan Sosial</h1>
            <p class="mt-2 text-base text-sm leading-6 text-gray-600 max-w-xl mx-auto">Informasi ini berkaitan dengan 
                bantuan sosial yang menampilkan informasi tentang penerimaan dan pengajuan bantuan sosial.</p>
        </div>
    </header>
    <div class="container mx-auto mt-2">
        @if ($message = Session::get('error'))
            <div id="alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-auto w-1/2" role="alert">
                <strong class="font-bold">Ops!</strong>
                <span class="block sm:inline">{{ $message }}</span>
                <!-- Tombol Close -->
                <span id="close-btn" class="absolute top-0 right-0 px-2 py-1 cursor-pointer">&times;</span>
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div id="alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mx-auto w-1/2" role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ $message }}</span>
                <!-- Tombol Close -->
                <span id="close-btn" class="absolute top-0 right-0 px-2 py-1 cursor-pointer">&times;</span>
            </div>
        @endif
    </div>
    <main class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
        <div class="max-w-6xl mx-auto flex justify-end mb-6">
            <a href="{{ route('bansos.penduduk.create') }}" class="text-white bg-blue-main border border-blue-main px-8 py-1 
                text-base font-small rounded-full drop-shadow-button">Ajukan</a>
        </div>
        
        <div class="max-w-6xl mx-auto card p-8 mb-12" style="box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 10px;">
            <form action="show" method="POST">
                @csrf
                <div class="sm:col-span-4">
                    <div class="mb-2">
                        <p><span style="font-weight: 600;">Jika Anda ingin melihat status bantuan sosial Anda</span></p>
                    </div>
                    <label for="nomer_kk" class="block text-sm font-medium leading-6 text-gray-900">Nomor Kartu Keluarga</label>
                    <div class="mt-2">
                        <input id="nomer_kk" name="nomer_kk" type="text" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3 
                            text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset 
                            focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Masukkan Nomor Kartu Keluarga">
                    </div>
                </div>
                <div class="flex items-center mt-4">
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

        function resetForm() {
            document.getElementById("nomer_kk").value = ""; // Reset nilai input Nomor Kartu Keluarga
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
