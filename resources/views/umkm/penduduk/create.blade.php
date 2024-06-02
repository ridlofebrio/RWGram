@extends('layouts.template')
@push('css')
<style>
    #myId{
        background: ;
        border-radius: 13px;
        max-width: 100%;
        margin-left: auto;
        margin-right: auto;
        border: 2px dashed #1833FF;
        margin-top: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
@endpush
@section('content')
        <header class="bg-white">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-left">
                <div class="flex items-center mb-4">
                    <a href="{{ route('umkm.penduduk.index') }}" class="text-blue-main hover:text-blue-main mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5M12 5l-7 7 7 7" />
                        </svg>              
                    </a>
                    <a href="{{ route('umkm.penduduk.index') }}">
                        <span class="text-blue-main text-md hover:text-blue-main">Permohonan UMKM</span>
                    </a>
                </div>
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Form Permohonan UMKM</h1>
                <p class="mt-2 text-base leading-6 text-gray-600 max-w-xl">Silakan mengisi form permohonan UMKM dengan benar, ya!</p>
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
                <form  action="{{ route('umkm.penduduk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="sm:col-span-4">
                        <label for="NIK" class="block text-sm font-medium leading-6 text-gray-900">NIK Anda</label>
                        <div class="mt-1 mb-4">
                            <input id="NIK" name="NIK" type="text" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3 
                                text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset 
                                focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Masukkan Nomor Induk Anda" value="{{ old('NIK') }}">
                            @error('NIK')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="nama_umkm" class="block text-sm font-medium leading-6 text-gray-900">Nama UMKM</label>
                        <div class="mt-1 mb-4">
                            <input id="nama_umkm" name="nama_umkm" type="text" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3 
                                text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset 
                                focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Masukkan Nama UMKM Anda" value="{{ old('nama_umkm') }}">
                            @error('nama_umkm')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror    
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="lokasi_umkm" class="block text-sm font-medium leading-6 text-gray-900">Alamat UMKM</label>
                        <div class="mt-1 mb-4">
                            <input id="lokasi_umkm" name="lokasi_umkm" type="text" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3 
                                text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset 
                                focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Masukkan Alamat UMKM Anda" value="{{ old('lokasi_umkm') }}">
                            @error('lokasi_umkm')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="no_whatsapp" class="block text-sm font-medium leading-6 text-gray-900">Nomor WhatsApp</label>
                        <div class="mt-1 mb-4">
                            <input id="no_whatsapp" name="no_whatsapp" type="text" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3 
                                text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset 
                                focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Masukkan Nomor WhatsApp Anda" value="{{ old('no_whatsapp') }}">
                            @error('no_whatsapp')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="nama_medsos" class="block text-sm font-medium leading-6 text-gray-900">Nama Akun Media Sosial</label>
                        <div class="mt-1 mb-4">
                            <input id="nama_medsos" name="nama_medsos" type="text" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3 
                                text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset focus:border-blue-600
                                focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Masukkan Nama Sosial Media Anda" value="{{ old('nama_medsos') }}">
                            @error('nama_medsos')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>                    
                    <div class="sm:col-span-4">
                        <label for="link_medsos" class="block text-sm font-medium leading-6 text-gray-900">Link Media Sosial</label>
                        <div class="mt-1 mb-4">
                            <input id="link_medsos" name="link_medsos" type="text" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3 
                                text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset focus:border-blue-600
                                focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Masukkan Link Sosial Media Anda" value="{{ old('link_medsos') }}">
                            @error('link_medsos')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>                    
                    <div class="sm:col-span-4">
                        <label for="deskripsi_umkm" class="block text-sm font-medium leading-6 text-gray-900">Deskripsi UMKM</label>
                        <div class="mt-1 mb-4">
                            <textarea id="deskripsi_umkm" name="deskripsi_umkm" type="text" autocomplete="off" 
                            class="block w-full h-40 rounded-md border-gray-300 shadow-sm focus:border-blue-600 focus:ring-blue-600 sm:text-sm" 
                            placeholder="Masukkan Deskripsi UMKM Anda">{{ old('deskripsi_umkm') }}</textarea>
                            @error('deskripsi_umkm')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- One Drive --}}
                    {{-- <div class="sm:col-span-4 relative h-52">
                        <label for="nama_medsos" class="block text-sm font-medium leading-6 text-gray-900">Foto UMKM</label>
                        <div class="mt-1 mb-4">
                            <input id="nama_medsos" name="foto_umkm" type="file" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3 
                                text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset focus:border-blue-600
                                focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Masukkan Nama Sosial Media Anda" value="{{ old('foto_umkm') }}">
                            @error('foto_umkm')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>    
                 --}}

<div>
    <label for="deskripsi_umkm" class="block text-sm font-medium leading-6 text-gray-900">Foto UMKM</label>
    <div id="myId" class="h-52">
        <input type="hidden" name="foto_umkm" id="public_id" >
        
       <div class="flex flex-col  items-center w-full">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="24" fill="none" viewBox="0 0 36 24">
            <path fill="#0096FF" d="M29.025 9.06C28.005 3.885 23.46 0 18 0c-4.335 0-8.1 2.46-9.975 6.06A8.991 8.991 0 0 0 0 15c0 4.965 4.035 9 9 9h19.5c4.14 0 7.5-3.36 7.5-7.5 0-3.96-3.075-7.17-6.975-7.44ZM28.5 21H9c-3.315 0-6-2.685-6-6 0-3.075 2.295-5.64 5.34-5.955l1.605-.165.75-1.425C12.12 4.71 14.91 3 18 3c3.93 0 7.32 2.79 8.085 6.645l.45 2.25 2.295.165A4.47 4.47 0 0 1 33 16.5c0 2.475-2.025 4.5-4.5 4.5ZM12 13.5h3.825V18h4.35v-4.5H24l-6-6-6 6Z"/>
          </svg>
          <p>Seret file Anda atau Klik file dari perangkat Anda </p>
          <p class="text-neutral-06">Ukuran file maksimal adalah 10 MB</p>
          
       </div>
    </div>
    <div class="dz-preview dz-file-preview">
        <div class="dz-details">
          <div class="dz-filename"><span data-dz-name></span></div>
          <div class="dz-size" data-dz-size></div>
          <img data-dz-thumbnail />
        </div>
        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
        <div class="dz-success-mark"><span>✔</span></div>
        <div class="dz-error-mark"><span>✘</span></div>
        <div class="dz-error-message"><span data-dz-errormessage></span></div>
      </div>
</div>
                    

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

// $(document).ready(function() {
//     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
//     $("div#myId").dropzone({
//         url: "{{ url('/upload') }}",
//         headers: {
//             'x-csrf-token': CSRF_TOKEN,
//         },
//     });
// });

let myDropzone = new Dropzone("div#myId", { 
    thumbnailHeight: 120,
  thumbnailWidth: 120,
  maxFilesize: 10,
    url: '{{url("cloudinary/upload")}}', 

    headers:{
        'x-csrf-token': '{{csrf_token()}}',
    }
    ,error:function(file,response){
        console.log(response);
},
success:function(file,response) {
    console.log(response)
    document.getElementById('public_id').value= response.asset_id;

}});
// Dropzone.options.coba= {
//     // Configuration options go here
//     addRemoveLinks:true,
//     url:'http://127.0.0.1:8000/umkm-penduduk/store',
//     success: function(file, response)
//                 {
//                     console.log(response);
//                 },
//                 error: function(file, response)
//                 {
//                     console.log(response);
//                 }
//   };

        let closeBtn = document.getElementById('close-btn');
        let agreeCheckbox = document.getElementById('agree');
        let submitBtn = document.getElementById('submitBtn');

        function resetForm() {
            // Reset nilai input
            document.getElementById("NIK").value = ""; 
            document.getElementById("nama_umkm").value = "";
            document.getElementById("lokasi_umkm").value = "";
            document.getElementById("no_whatsapp").value = "";
            document.getElementById("link_medsos").value = "";
            document.getElementById("nama_medsos").value = "";
            document.getElementById("deskripsi_umkm").value = "";
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