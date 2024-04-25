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
            <form action="{{ route('bansos.store') }}" method="POST" enctype="multipart/form-data">
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
                <div class="sm:col-span-4">
                    <label for="total_pendapatan" class="block text-sm font-medium leading-6 text-gray-900">Jumlah Total Pendapatan</label>
                    <div class="mt-1 mb-4">
                        <input id="total_pendapatan" name="total_pendapatan" type="text" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3 
                            text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset 
                            focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Masukkan Jumlah Total Pendapatan Anda" value="{{ old('total_pendapatan') }}">
                        @error('total_pendapatan')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror    
                    </div>
                </div>
                <div class="sm:col-span-4">
                    <label for="jumlah_tanggungan" class="block text-sm font-medium leading-6 text-gray-900">Jumlah Tanggungan</label>
                    <div class="mt-1 mb-4">
                        <input id="jumlah_tanggungan" name="jumlah_tanggungan" type="text" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3 
                            text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset 
                            focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Masukkan Total Anggota Keluarga yang ditanggung" value="{{ old('jumlah_tanggungan') }}">
                        @error('jumlah_tanggungan')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-4">
                    <label for="jumlah_kendaraan" class="block text-sm font-medium leading-6 text-gray-900">Jumlah Kendaraan</label>
                    <div class="mt-1 mb-4">
                        <input id="jumlah_kendaraan" name="jumlah_kendaraan" type="text" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3 
                            text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset 
                            focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Masukkan Jumlah Kendaraan Anda" value="{{ old('jumlah_kendaraan') }}">
                        @error('jumlah_kendaraan')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-4">
                    <label for="jumlah_watt" class="block text-sm font-medium leading-6 text-gray-900">Jumlah Watt Listrik</label>
                    <div class="mt-1 mb-4">
                        <input id="jumlah_watt" name="jumlah_watt" type="text" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3 
                            text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset 
                            focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Masukkan Jumlah Watt Listrik Anda" value="{{ old('jumlah_watt') }}">
                        @error('jumlah_watt')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-4">
                    <label for="luas_rumah" class="block text-sm font-medium leading-6 text-gray-900">Luas Rumah</label>
                    <div class="mt-1 mb-4">
                        <input id="luas_rumah" name="luas_rumah" type="text" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3 
                            text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset 
                            focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Masukkan Luas Rumah Anda" value="{{ old('luas_rumah') }}">
                        @error('luas_rumah')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-4">
                    <label for="luas_tanah" class="block text-sm font-medium leading-6 text-gray-900">Luas Tanah</label>
                    <div class="mt-1 mb-4">
                        <input id="luas_tanah" name="luas_tanah" type="text" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3 
                            text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset 
                            focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Masukkan Luas Tanah Anda" value="{{ old('luas_tanah') }}">
                        @error('luas_tanah')
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
            <div class="card-body">

                <label>Drag and Drop Multiple Images (JPG, JPEG, PNG, .webp)</label>

                <form action="{{ route('bansos.store') }}" method="POST" enctype="multipart/form-data"
                    class="dropzone" id="myDragAndDropUploader">
                    @csrf
                </form>

                <h5 id="message"></h5>

            </div>
        </div>
    </main>

    <script type="text/javascript">
        // Upload files
        var maxFilesizeVal = 10;
        var maxFilesVal = 5;

        // Note that the name "myDragAndDropUploader" is the camelized id of the form.
        Dropzone.options.myDragAndDropUploader = {
           
            paramName:"file",
            maxFilesize: maxFilesizeVal, // MB
            maxFiles: maxFilesVal,
            resizeQuality: 1.0,
            acceptedFiles: ".jpeg,.jpg,.png,.webp",
            addRemoveLinks: false,
            timeout: 60000,
            dictDefaultMessage: "Seret file Anda atau unggah file dari perangkat Anda",
            dictFallbackMessage: "Your browser doesn't support drag and drop file uploads.",
            dictFileTooBig: "File is too big. Max filesize: "+maxFilesizeVal+"MB.",
            dictInvalidFileType: "Invalid file type. Only JPG, JPEG, PNG and GIF files are allowed.",
            dictMaxFilesExceeded: "You can only upload up to "+maxFilesVal+" files.",
            maxfilesexceeded: function(file) {
                this.removeFile(file);
                // this.removeAllFiles(); 
            },
            sending: function (file, xhr, formData) {
                $('#message').text('Image Uploading...');
            },
            success: function (file, response) {
                $('#message').text(response.message);
                // console.log(response);
            },
            error: function (file, response) {
                $('#message').text('Something Went Wrong! '+response);
                console.log(response);
                return false;
            }
        };

        let closeBtn = document.getElementById('close-btn');
        let agreeCheckbox = document.getElementById('agree');
        let submitBtn = document.getElementById('submitBtn');

        function resetForm() {
            // Reset nilai input
            document.getElementById("nomer_kk").value = ""; 
            document.getElementById("nama_pengaju").value = "";
            document.getElementById("total_pendapatan").value = "";
            document.getElementById("jumlah_tanggungan").value = "";
            document.getElementById("jumlah_kendaraan").value = "";
            document.getElementById("jumlah_watt").value = "";
            document.getElementById("luas_rumah").value = "";
            document.getElementById("luas_tanah").value = "";
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
