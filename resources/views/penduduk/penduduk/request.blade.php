@extends('layouts.template')

@section('content')
    <header class="bg-white">
        <div class="mx-auto max-w-7xl px-8 pt-12 pb-6 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl font-extrabold text-neutral-10">Data Diri</h1>
            <p class="mt-6 font-normal leading-6 text-neutral-10 max-w-4xl mx-auto">Informasi ini berkaitan dengan
                data diri yang menampilkan informasi tentang data diri penduduk RW 06 Kelurahan Kalirejo Kecamatan Lawang.
            </p>
        </div>
    </header>
    <div class="container mx-auto my-2">
        @if ($message = Session::get('error'))
            <div id="alert"
                class="bg-red-100 border border-red-400 text-red-700 px-6 py-3 rounded-lg relative mx-auto w-2/3"
                role="alert">
                <strong class="font-bold">Maaf! </strong>
                <span class="block sm:inline">{{ $message }}</span>
                <!-- Tombol Close -->
                <span id="close-btn" class="absolute top-1.5 right-0 px-2 py-1 cursor-pointer">&times;</span>
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div id="alert"
                class="bg-green-100 border border-green-400 text-green-700 px-6 py-3 rounded-lg relative mx-auto w-2/3"
                role="alert">
                <strong class="font-bold">Berhasil! </strong>
                <span class="block sm:inline">{{ $message }}</span>
                <!-- Tombol Close -->
                <span id="close-btn" class="absolute top-1.5 right-0 px-2 py-1 cursor-pointer">&times;</span>
            </div>
        @endif
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <!-- Your content -->
            <div class="max-w-6xl mx-auto card p-8 mb-12 sm:px"
                style="box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                <form action="show" method="POST">
                    @csrf
                    <div class="sm:col-span-4">
                        <div class="mb-6 font-semibold text-lg text-neutral-10">
                            <p>Jika Anda ingin melihat data diri Anda</p>
                        </div>
                        <label for="nik" class="block text-sm font-medium leading-6">NIK Anda</label>
                        <div class="mt-2">
                            <input id="nik" name="nik" type="text" autocomplete="off"
                                class="block w-full rounded-md border-0 py-3 px-4 font-medium
                                text-neutral-10 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-neutral-06 focus:ring-2 focus:ring-inset
                                focus:ring-blue-600 sm:text-sm sm:leading-6"
                                placeholder="Masukkan Nomor Induk Kependudukan">
                        </div>
                    </div>
                    <div class="flex items-center mt-6">
                        <input id="agree" type="checkbox" class="form-checkbox h-4 w-4 rounded-md text-blue-600" />
                        <label for="agree" class="ml-2 block text-sm font-medium text-neutral-10">
                            Apakah data Anda sudah benar?
                        </label>
                    </div>
                    <div
                        class="flex flex-col-reverse gap-4 sm:flex-row justify-center mt-12 space-y-4 sm:space-x-8 sm:space-y-0">
                        <button type="button"
                            class="text-blue-main hover:bg-[#CCEAFF] hover:text-blue-main hover:border-blue-main
                            border border-blue-main px-10 py-2 text-base font-medium rounded-full sm:px-20"
                            onclick="resetForm()">Batal</button>
                        <button type="submit" id="submitBtn" disabled
                            class="text-white bg-neutral-06 px-10 py-2 text-base font-medium rounded-full sm:px-20">Cari</button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        let closeBtn = document.getElementById('close-btn');
        let agreeCheckbox = document.getElementById('agree');
        let submitBtn = document.getElementById('submitBtn');

        function resetForm() {
            document.getElementById("nik").value = ""; // Reset nilai input Nomor Kartu Keluarga
            agreeCheckbox.checked = false; // Uncheck checkbox
            submitBtn.disabled = true; // Disable tombol Kirim
            submitBtn.classList.remove('bg-blue-main'); // Hapus warna latar belakang tombol Kirim\
            submitBtn.classList.remove('hover:bg-dodger-blue-800'); // Hapus warna latar belakang tombol Kirim
            submitBtn.classList.add('bg-neutral-06'); // Tambahkan warna latar belakang abu-abu pada tombol Kirim
        }

        agreeCheckbox.addEventListener('change', function() {
            if (this.checked) {
                submitBtn.disabled = false;
                submitBtn.classList.remove('bg-neutral-06');
                submitBtn.classList.add('hover:bg-dodger-blue-800');
                submitBtn.classList.add('bg-blue-main');
            } else {
                submitBtn.disabled = true;
                submitBtn.classList.remove('bg-blue-main');
                submitBtn.classList.remove('hover:bg-dodger-blue-800');
                submitBtn.classList.add('bg-neutral-06');
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
