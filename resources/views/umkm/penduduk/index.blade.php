@extends('layouts.template')

@section('content')
    <header class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">UMKM</h1>
            <p class="mt-2 text-base leading-6 text-gray-600 max-w-4xl mx-auto">Informasi ini berisikan UMKM yang berada di lingkungan RW. 
                Di sekitar lingkungan RW, terdapat beragam Usaha Mikro, Kecil, dan Menengah (UMKM) yang menjadi bagian penting dari ekosistem perekonomian lokal. Melalui UMKM, para warga tidak hanya menyediakan berbagai produk dan layanan yang dibutuhkan oleh masyarakat sekitar, tetapi juga menjadi motor penggerak ekonomi yang mempererat hubungan antarwarga.</p>
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
    <div class="bg-white-100 mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">        
        <div class="flex justify-between my-4 mb-4">
            <div class="flex gap-3 drop-shadow-lg">
                <form action="{{ route('umkm.penduduk.index') }}" method="GET" class="max-w-sm mx-auto">
                    <div class="relative">
                        <input type="text" name="search" class="pl-10 block w-full p-2 border border-gray-300 rounded-full bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari UMKM" required />
                        <div class="absolute inset-y-0 start-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                    </div>
                </form>
            </div>
            <button onclick="window.location.href='{{ route('umkm.penduduk.create') }}'" class="text-white bg-blue-main px-8 py-2 font-medium text-base rounded-full shadow-lg hover:bg-dodgerblue">Ajukan</button>
        </div> 
        <div class="grid grid-cols-1 gap-y-1 md:grid-cols-3 md:gap-x-6">
            @if($umkm->isEmpty())
                <p class="text-center text-xl text-neutral-07">Tidak ada UMKM yang tersedia</p>
            @else
                @foreach ($umkm as $data)
                    @if ($data->status_pengajuan !== 'menunggu' && $data->status_pengajuan !== 'ditolak')
                        <div class="max-w-xl mx-auto card p-8 mb-12" style="box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                            <div class="shrink-0 mb-4 md:mb-[40px]">
                                <img src="https://i.ibb.co/hX6pfms/img32.jpg" class="rounded-lg object-cover h-[280px] w-[360px]"/>
                            </div>
                            <p class="mb-[8px] font-medium text-lg text-neutral dark:text-white text-black line-clamp-2">
                                {{ $data->nama_umkm }}
                            </p>
                            <p class="mb-[20px] text-base text-neutral dark:text-white text-black line-clamp-3">
                                {{ $data->deskripsi_umkm }}
                            </p>                                
                            <div class="mb-[12px] text-base flex items-center text-neutral dark:text-white text-black">
                                <img src="{{ asset('asset/icon/Icons-location.png') }}" class="w-[24px] [24px] mr-2 fill-current" alt="Lokasi Icon">
                                <p class="line-clamp-1">{{ $data->lokasi_umkm }}</p>
                            </div>                                                                  
                            <div class="mb-[12px] text-base flex items-center text-neutral dark:text-white text-black">
                                <img src="{{ asset('asset/icon/Icons-user.png') }}" class="w-[24px] [24px] mr-2 fill-current" alt="Lokasi Icon">
                                <p class="line-clamp-1">{{ $data->penduduk->nama_penduduk }}</p>
                            </div>                                                                                                                                   
                            <div class="mb-[12px] text-base flex items-center text-neutral dark:text-white text-black">
                                <a href="https://wa.me/{{ $data->no_wa }}" target="_blank" rel="noopener noreferrer" class="flex items-center">
                                    <img src="{{ asset('asset/icon/Icons-wa.png') }}" class="w-[24px] h-[24px] mr-2" alt="Icon Media Sosial">
                                    <p class="line-clamp-1">https://wa.me/{{ $data->no_wa }}</p>
                                </a>
                            </div>                                                                                     
                            <div class="text-base flex items-center text-neutral dark:text-white text-black">
                                @if($data->link_medsos && $data->nama_medsos)
                                    <a href="{{ $data->link_medsos }}" target="_blank" rel="noopener noreferrer" class="flex items-center">
                                        <img src="{{ asset('asset/icon/Icons-ig.png') }}" class="w-[24px] h-[24px] mr-2" alt="Icon Media Sosial">
                                        <p class="line-clamp-1">{{ $data->nama_medsos }}</p>
                                    </a>
                                @else
                                    <img src="{{ asset('asset/icon/Icons-ig.png') }}" class="w-[24px] h-[24px] mr-2" alt="Icon Media Sosial">
                                    <p class="line-clamp-1">-</p>
                                @endif
                            </div>                                                                                                       
                        </div> 
                    @endif
                @endforeach
            @endif  
        </div>
    </div>

    <script>
        // Fungsi untuk menyembunyikan alert setelah 5 detik
        function hideAlert() {
            let alert = document.getElementById('alert');
            if (alert) {
                alert.style.display = 'none';
            }
        }

        // Tambahkan event listener untuk tombol close alert
        document.addEventListener('DOMContentLoaded', function() {
            let closeBtn = document.getElementById('close-btn');
            if (closeBtn) {
                closeBtn.addEventListener('click', function() {
                    hideAlert();
                });
            }

            // Sembunyikan alert setelah 5 detik
            setTimeout(hideAlert, 5000);
        });
    </script>
@endsection
