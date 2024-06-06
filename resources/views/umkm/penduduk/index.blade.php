@inject('adminApi', \Cloudinary\Api\Admin\AdminApi::class)
@extends('layouts.template')

@section('content')
    <header class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl font-extrabold text-neutral-10">UMKM</h1>
            <p class="mt-6 font-normal leading-6 text-neutral-10 max-w-4xl mx-auto">Informasi ini berisikan UMKM yang berada di lingkungan RW. Di sekitar lingkungan RW, terdapat beragam Usaha Mikro, Kecil, dan Menengah (UMKM) yang menjadi bagian penting dari ekosistem perekonomian lokal. Melalui UMKM, para warga tidak hanya menyediakan berbagai produk dan layanan yang dibutuhkan oleh masyarakat sekitar, tetapi juga menjadi motor penggerak ekonomi yang mempererat hubungan antarwarga.</p>
        </div>
    </header>

    <div class="container mx-auto mt-2">
        @if ($message = Session::get('error'))
            <div id="alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-auto sm:w-1/2 w-11/12" role="alert">
                <strong class="font-bold">Ops!</strong>
                <span class="block sm:inline">{{ $message }}</span>
                <!-- Tombol Close -->
                <span id="close-btn" class="absolute top-0 right-0 px-2 py-1 cursor-pointer">&times;</span>
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div id="alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mx-auto sm:w-1/2 w-11/12" role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ $message }}</span>
                <!-- Tombol Close -->
                <span id="close-btn" class="absolute top-0 right-0 px-2 py-1 cursor-pointer">&times;</span>
            </div>
        @endif
    </div>

    <div class="bg-white mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-end md:justify-between mb-12 gap-3">
            <div class="drop-shadow-md w-full md:w-1/2">
                <form action="{{ route('umkm.penduduk.index') }}" method="GET" class="w-full">
                    @include('component.search')
                </form>
            </div>
            <button onclick="window.location.href='{{ route('umkm.penduduk.create') }}'"
                class="text-white bg-blue-main px-8 py-2 font-semibold text-base rounded-full  drop-shadow-button hover:bg-dodger-blue-800">Ajukan</button>
        </div>

        <div class="grid grid-cols-1 gap-y-6 md:grid-cols-2 lg:grid-cols-3 md:gap-x-6">
            @if ($umkm->isEmpty())
                <div class="col-span-full text-center">
                    <p class="text-lg text-neutral-06">Tidak ada UMKM yang tersedia</p>
                </div>
            @else
                @foreach ($umkm as $data)
                    @if ($data->status_pengajuan !== 'menunggu' && $data->status_pengajuan !== 'ditolak')
                        <div class="max-w-xl mx-auto card p-8 mb-12" style="box-shadow: 0 -2px 6px rgba(91, 76, 76, 0.1), 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                            <div class="shrink-0 mb-4 md:mb-6">

                                
                                <img src="{{$data->foto_umkm == null ? 'https://res.cloudinary.com/dtzlizlrs/image/upload/v1717600371/ovayldsch5461a8ffv3m.jpg' : $data->foto_umkm}}" class="rounded-lg object-cover w-full h-[280px] md:h-[280px] lg:h-[280px]" alt="{{ $data->nama_umkm }}">

                            </div>
                            <p class="mb-2 font-bold text-lg text-neutral dark:text-white text-black line-clamp-2">{{ $data->nama_umkm }}</p>
                            <p class="mb-5 text-sm text-neutral dark:text-white text-black line-clamp-3">{{ $data->deskripsi_umkm }}</p>
                            <div
                                class="mb-[12px] font-medium text-sm flex items-center text-neutral dark:text-white text-black">
                                <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="#1B1B1B" stroke-width="1.5"
                                        d="M12 13.43a3.12 3.12 0 1 0 0-6.24 3.12 3.12 0 0 0 0 6.24Z" />
                                    <path stroke="#1B1B1B" stroke-width="1.5"
                                        d="M3.62 8.49c1.97-8.66 14.8-8.65 16.76.01 1.15 5.08-2.01 9.38-4.78 12.04a5.193 5.193 0 0 1-7.21 0c-2.76-2.66-5.92-6.97-4.77-12.05Z" />
                                </svg>


                                <p class="line-clamp-1">{{ $data->lokasi_umkm }}</p>
                            </div>
                            <div
                                class="mb-[12px] font-medium text-sm flex items-center text-neutral dark:text-white text-black">
                                <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12.16 10.87c-.1-.01-.22-.01-.33 0a4.42 4.42 0 0 1-4.27-4.43C7.56 3.99 9.54 2 12 2a4.435 4.435 0 0 1 .16 8.87Zm-5 3.69c-2.42 1.62-2.42 4.26 0 5.87 2.75 1.84 7.26 1.84 10.01 0 2.42-1.62 2.42-4.26 0-5.87-2.74-1.83-7.25-1.83-10.01 0Z" />
                                </svg>


                                <p class="line-clamp-1">{{ $data->penduduk->nama_penduduk }}</p>
                            </div>
                            <div
                                class="mb-[12px] font-medium text-sm flex items-center text-neutral hover:text-blue-main dark:text-white text-black">
                                <a href="https://wa.me/{{ $data->no_wa }}" target="_blank" rel="noopener noreferrer"
                                    class="flex items-center">
                                    <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path fill="#1B1B1B"
                                            d="m3 21 1.336-4.879a9.395 9.395 0 0 1-1.257-4.707C3.082 6.224 7.305 2 12.494 2a9.35 9.35 0 0 1 6.66 2.761 9.36 9.36 0 0 1 2.756 6.661c-.003 5.191-4.226 9.415-9.416 9.415a9.42 9.42 0 0 1-4.503-1.146L3 21Zm5.223-3.014c1.326.788 2.593 1.26 4.268 1.26 4.313 0 7.827-3.51 7.829-7.825a7.823 7.823 0 0 0-7.822-7.831c-4.317 0-7.828 3.51-7.83 7.825 0 1.761.516 3.08 1.383 4.46l-.79 2.888 2.962-.777Zm9.014-4.325c-.058-.099-.215-.157-.45-.275-.236-.118-1.393-.687-1.609-.766-.215-.078-.372-.118-.53.118-.156.235-.607.766-.744.923-.137.156-.275.176-.51.058s-.994-.366-1.892-1.168c-.7-.623-1.172-1.394-1.309-1.63-.137-.235-.014-.362.103-.48.106-.105.235-.274.353-.412.12-.136.158-.234.238-.392.078-.157.04-.294-.02-.412-.06-.117-.53-1.276-.725-1.747-.192-.458-.386-.396-.53-.403l-.451-.008a.862.862 0 0 0-.627.294c-.216.236-.824.804-.824 1.963 0 1.158.844 2.277.96 2.433.119.157 1.66 2.534 4.02 3.553.56.242 1 .387 1.34.495a3.233 3.233 0 0 0 1.482.094c.452-.068 1.392-.57 1.588-1.12.197-.55.197-1.02.137-1.118Z" />
                                    </svg>

                                    <p class="line-clamp-1">https://wa.me/{{ $data->no_wa }}</p>
                                </a>
                            </div>
                            <div
                                class="text-sm font-medium flex items-center text-neutral hover:text-blue-main dark:text-white text-black">
                                @if ($data->link_medsos && $data->nama_medsos)
                                    <a href="{{ $data->link_medsos }}" target="_blank" rel="noopener noreferrer"
                                        class="flex items-center">
                                        <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path fill="#1B1B1B"
                                                d="M12.5 4.71c2.538 0 2.839.012 3.837.056.928.041 1.429.197 1.763.327.441.17.76.378 1.09.709.335.334.539.65.71 1.09.13.335.285.84.326 1.763.045 1.002.056 1.303.056 3.838 0 2.538-.011 2.838-.056 3.837-.04.927-.197 1.428-.326 1.762a2.93 2.93 0 0 1-.71 1.091 2.934 2.934 0 0 1-1.09.71c-.334.13-.839.285-1.763.326-1.002.044-1.302.055-3.837.055-2.538 0-2.839-.01-3.837-.055-.928-.041-1.429-.197-1.763-.327a2.938 2.938 0 0 1-1.09-.709 2.922 2.922 0 0 1-.71-1.09c-.13-.335-.285-.84-.326-1.763-.045-1.002-.056-1.303-.056-3.837 0-2.539.011-2.84.056-3.838.04-.927.197-1.428.326-1.762a2.93 2.93 0 0 1 .71-1.091 2.92 2.92 0 0 1 1.09-.709c.334-.13.839-.286 1.763-.327.998-.044 1.299-.055 3.837-.055Zm0-1.71c-2.58 0-2.902.011-3.915.056-1.01.044-1.703.207-2.305.441a4.637 4.637 0 0 0-1.684 1.099 4.655 4.655 0 0 0-1.099 1.68c-.234.606-.397 1.296-.441 2.305C3.01 9.598 3 9.921 3 12.5c0 2.58.011 2.902.056 3.915.044 1.01.207 1.703.441 2.305a4.637 4.637 0 0 0 1.099 1.684 4.643 4.643 0 0 0 1.68 1.095c.606.234 1.296.397 2.305.442 1.013.044 1.336.055 3.915.055 2.58 0 2.902-.01 3.915-.055 1.01-.045 1.704-.208 2.305-.442a4.643 4.643 0 0 0 1.68-1.095 4.644 4.644 0 0 0 1.096-1.68c.233-.606.397-1.296.441-2.305.045-1.013.056-1.336.056-3.915 0-2.58-.011-2.902-.056-3.915-.044-1.01-.208-1.704-.441-2.305a4.45 4.45 0 0 0-1.088-1.688 4.644 4.644 0 0 0-1.68-1.095c-.606-.234-1.296-.397-2.305-.442C15.402 3.011 15.079 3 12.5 3Z" />
                                            <path fill="#1B1B1B"
                                                d="M12.5 7.62a4.881 4.881 0 0 0 0 9.76 4.881 4.881 0 0 0 0-9.76Zm0 8.045a3.166 3.166 0 1 1 0-6.331 3.166 3.166 0 0 1 0 6.331Zm6.212-8.238a1.14 1.14 0 1 1-2.279 0 1.14 1.14 0 0 1 2.28 0Z" />
                                        </svg>
                                        <p class="line-clamp-1">{{ $data->nama_medsos }}</p>
                                    </a>
                                @else
                                    <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path fill="#1B1B1B"
                                            d="M12.5 4.71c2.538 0 2.839.012 3.837.056.928.041 1.429.197 1.763.327.441.17.76.378 1.09.709.335.334.539.65.71 1.09.13.335.285.84.326 1.763.045 1.002.056 1.303.056 3.838 0 2.538-.011 2.838-.056 3.837-.04.927-.197 1.428-.326 1.762a2.93 2.93 0 0 1-.71 1.091 2.934 2.934 0 0 1-1.09.71c-.334.13-.839.285-1.763.326-1.002.044-1.302.055-3.837.055-2.538 0-2.839-.01-3.837-.055-.928-.041-1.429-.197-1.763-.327a2.938 2.938 0 0 1-1.09-.709 2.922 2.922 0 0 1-.71-1.09c-.13-.335-.285-.84-.326-1.763-.045-1.002-.056-1.303-.056-3.837 0-2.539.011-2.84.056-3.838.04-.927.197-1.428.326-1.762a2.93 2.93 0 0 1 .71-1.091 2.92 2.92 0 0 1 1.09-.709c.334-.13.839-.286 1.763-.327.998-.044 1.299-.055 3.837-.055Zm0-1.71c-2.58 0-2.902.011-3.915.056-1.01.044-1.703.207-2.305.441a4.637 4.637 0 0 0-1.684 1.099 4.655 4.655 0 0 0-1.099 1.68c-.234.606-.397 1.296-.441 2.305C3.01 9.598 3 9.921 3 12.5c0 2.58.011 2.902.056 3.915.044 1.01.207 1.703.441 2.305a4.637 4.637 0 0 0 1.099 1.684 4.643 4.643 0 0 0 1.68 1.095c.606.234 1.296.397 2.305.442 1.013.044 1.336.055 3.915.055 2.58 0 2.902-.01 3.915-.055 1.01-.045 1.704-.208 2.305-.442a4.643 4.643 0 0 0 1.68-1.095 4.644 4.644 0 0 0 1.096-1.68c.233-.606.397-1.296.441-2.305.045-1.013.056-1.336.056-3.915 0-2.58-.011-2.902-.056-3.915-.044-1.01-.208-1.704-.441-2.305a4.45 4.45 0 0 0-1.088-1.688 4.644 4.644 0 0 0-1.68-1.095c-.606-.234-1.296-.397-2.305-.442C15.402 3.011 15.079 3 12.5 3Z" />
                                        <path fill="#1B1B1B"
                                            d="M12.5 7.62a4.881 4.881 0 0 0 0 9.76 4.881 4.881 0 0 0 0-9.76Zm0 8.045a3.166 3.166 0 1 1 0-6.331 3.166 3.166 0 0 1 0 6.331Zm6.212-8.238a1.14 1.14 0 1 1-2.279 0 1.14 1.14 0 0 1 2.28 0Z" />
                                    </svg>
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
        document.addEventListener('DOMContentLoaded', function() {
            const alertBox = document.getElementById('alert');
            const closeBtn = document.getElementById('close-btn');

            if (alertBox && closeBtn) {
                closeBtn.addEventListener('click', function() {
                    alertBox.style.display = 'none';
                });

                setTimeout(function() {
                    if (alertBox) {
                        alertBox.style.display = 'none';
                    }
                }, 5000); // Waktu dalam milidetik (5000ms = 5 detik)
            }
        });
    </script>
@endsection