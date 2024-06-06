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
        margin-top: 16px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }
    .loader {

width: 90px;
height: 14px;
--c:#0096FF 92%,white;
background:
  radial-gradient(circle 7px at bottom,var(--c)) 0 0,
  radial-gradient(circle 7px at top   ,var(--c)) 0 100%;
background-size: calc(100%/4) 50%;
background-repeat: repeat-x;
animation: l11 1s infinite;
}
@keyframes l11 {
  80%,100% {background-position: calc(100%/3) 0,calc(100%/-3) 100%}
}
.dz-success-mark{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 10;


}





</style>
@endpush
@section('content')
    <header class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-left">
            <div class="flex items-center mb-4">
                <a href="{{ route('laporan.penduduk.index') }}" class="text-blue-main hover:text-blue-main mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5M12 5l-7 7 7 7" />
                    </svg>
                </a>
                <a href="{{ route('laporan.penduduk.index') }}">
                    <span class="text-blue-main text-md hover:text-blue-main">Halaman Pengaduan</span>
                </a>
            </div>
            <h1 class="text-3xl font-bold tracking-tight text-neutral-10">Form Pengaduan Masyarakat</h1>
            <p class="mt-2 text-base leading-6 text-neutral-10 max-w-xl">Silakan mengisi form pengaduan dengan benar, ya!</p>
        </div>
    </header>
    <div class="container mx-auto">
        @if ($message = Session::get('error'))
            <div id="alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-auto w-2/3" role="alert">
                <strong class="font-bold">Ops!</strong>
                <span class="block sm:inline">{{ $message }}</span>
                <!-- Tombol Close -->
                <span id="close-btn" class="absolute top-0 right-0 px-2 py-1 cursor-pointer">&times;</span>
            </div>
        @endif
    </div>
    <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
        <div class="max-w-7xl mx-auto card p-8 mb-12" style="box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 10px;">
            <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="sm:col-span-4">
                    <label for="NIK_pengaju" class="block text-sm font-medium leading-6 text-neutral-10">NIK Anda</label>
                    <div class="mt-1 mb-4">
                        <input id="NIK_pengaju" name="NIK_pengaju" type="text" autocomplete="off" class="block w-full rounded-md border-0 py-1.5 pl-2 pr-3
                            text-neutral-10 shadow-sm ring-1 ring-inset ring-gray-300 placeholder-gray-400 focus:ring-2 focus:ring-inset
                            focus:ring-blue-600 sm:text-sm sm:leading-6 " placeholder="Masukkan Nomor Induk Anda" value="{{ old('NIK_pengaju') }}">
                        @error('NIK_pengaju')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-4">
                    <label for="deskripsi_laporan" class="block text-sm font-medium leading-6 text-neutral-10">Deskripsi Laporan</label>
                    <div class="mt-1 mb-4">
                        <textarea id="deskripsi_laporan" name="deskripsi_laporan" type="text" autocomplete="off"
                        class="block w-full h-40 rounded-md border-gray-300 shadow-sm focus:border-blue-600 focus:ring-blue-600 sm:text-sm"
                        placeholder="Masukkan Deskripsi laporan Anda">{{ old('deskripsi_laporan') }}</textarea>
                        @error('deskripsi_laporan')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- <div class="card-body">
                    <label>Drag and Drop Multiple Images (JPG, JPEG, PNG, .webp)</label>
                    <div class="dropzone" id="myDragAndDropUploader"></div>
                    <h5 id="message"></h5>
                </div> --}}

                <div>
                    <label for="deskripsi_umkm" class="block text-sm font-medium leading-6 text-neutral-10">Bukti</label>
                    <div id="myId" class="h-52 ">
                        <input type="hidden" name="foto_umkm" id="public_id" >
                        <input type="hidden" name="asset_id" id="asset_id" >

                       <div id="text-main" class="flex flex-col  items-center w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="24" fill="none" viewBox="0 0 36 24">
                            <path fill="#0096FF" d="M29.025 9.06C28.005 3.885 23.46 0 18 0c-4.335 0-8.1 2.46-9.975 6.06A8.991 8.991 0 0 0 0 15c0 4.965 4.035 9 9 9h19.5c4.14 0 7.5-3.36 7.5-7.5 0-3.96-3.075-7.17-6.975-7.44ZM28.5 21H9c-3.315 0-6-2.685-6-6 0-3.075 2.295-5.64 5.34-5.955l1.605-.165.75-1.425C12.12 4.71 14.91 3 18 3c3.93 0 7.32 2.79 8.085 6.645l.45 2.25 2.295.165A4.47 4.47 0 0 1 33 16.5c0 2.475-2.025 4.5-4.5 4.5ZM12 13.5h3.825V18h4.35v-4.5H24l-6-6-6 6Z"/>
                          </svg>
                          <p>Seret file Anda atau Klik file dari perangkat Anda </p>
                          <p class="text-neutral-06">Ukuran file maksimal adalah 10 MB</p>

                       </div>
                       <div style="z-index: 99999" id="loading-image"  class="hidden fixed top-1/2 left-1/2 justify-center items-center -translate-x-1/2 -translate-y-1/2  w-screen h-screen bg-white opacity-70" style="display: none;" ><div class="  loader " ></div></div>
                    </div>
                    <p id="Error-Messages" class="text-red-600" ></p>

                </div>
                <div class="flex items-center mt-6">
                    <input id="agree" type="checkbox" class="form-checkbox h-4 w-4 text-blue-600 rounded-md" />
                    <label for="agree" class="ml-2 block text-sm text-neutral-10">
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
                        class="text-white bg-gray-400 px-10 py-2 text-base font-medium rounded-full sm:px-20">Kirim</button>
                </div>
            </form>
        </div>
    </main>
    <script>
        // ============== dropzone ====================

const errorMessage = $('#dzErrorMessage');
const placeHolder = $('#dzPlaceholder');


let myDropzone = new Dropzone("div#myId", {
  thumbnailHeight: 120,
  thumbnailWidth: 120,
  uploadMultiple:false,
  maxFiles:1,
  addRemoveLinks:true,
  maxFilesize: 10,
    url: '{{url("cloudinary/upload")}}',

    headers:{
        'x-csrf-token': '{{csrf_token()}}',
    },
    uploadprogress: function(file, progress, bytesSent) {
        $('#text-main').hide();
        console.log(file);
    if (file.previewElement) {
        var progressElement = document.querySelector("#loading-image");

        progressElement.classList.remove("hidden");
        progressElement.classList.add("flex");

    }
},

  success:function(file,response) {
    var progressElement = document.querySelector("#loading-image");
    progressElement.classList.remove("flex");
        progressElement.classList.add("hidden");

    document.getElementById('asset_id').value= response.asset_id;
    document.getElementById('public_id').value= response.secure_url;

    },
    removedfile(file) {
        const asset_id = document.getElementById('asset_id').value
        console.log('dancok');
        $.ajax({
            url:"{{url('cloudinary/delete')}}"+'/'+asset_id,
            method:'GET',
            beforeSend: function() {
              $("#loading-image").removeClass('hidden');
              $("#loading-image").addClass('flex');
           },
            success:function(data){
                $("#loading-image").removeClass('flex');
                $("#loading-image").addClass('hidden');

                if (file.previewElement != null && file.previewElement.parentNode != null) {
      file.previewElement.parentNode.removeChild(file.previewElement);
      $('#text-main').show();

    }
     return this._updateMaxFilesReachedClass();
            }
        })
  },
});

myDropzone.on('addedfile', function(file) {
    $('.dz-success-mark').hide()
        $('.dz-error-mark').hide()
        $('.dz-error-message').hide()


});

const removefile=  (file)=>{
    if (file.previewElement != null && file.previewElement.parentNode != null) {
      file.previewElement.parentNode.removeChild(file.previewElement);
      $('#text-main').show();

    }
}

myDropzone.on('error', function(file, response) {
    $('#Error-Messages').html(response);

    removefile(file);


});

// // ============== End Dropzone ====================



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
        document.getElementById("NIK_pengaju").value = "";
        document.getElementById("deskripsi_laporan").value = "";
        agreeCheckbox.checked = false; // Uncheck checkbox
        submitBtn.disabled = true; // Disable tombol Kirim
        submitBtn.classList.remove('bg-blue-main'); // Hapus warna latar belakang tombol Kirim
        submitBtn.classList.add('bg-gray-400'); // Tambahkan warna latar belakang abu-abu pada tombol Kirim
    }

    // Fungsi untuk menyembunyikan alert setelah 5 detik
    function hideAlert() {
        let alert = document.getElementById('alert');
        if (alert) {
            alert.style.display = 'none';
        }
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', function() {
            hideAlert();
        });
    }

    setTimeout(hideAlert, 5000);
    </script>
@endsection
