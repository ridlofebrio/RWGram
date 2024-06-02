@extends('layouts.template')

@section('content')
    <header class="bg-white">
        <div class="mx-auto max-w-7xl px-8 py-12 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl font-extrabold text-neutral-10">Pengaduan</h1>
            <p class="mt-6 font-normal leading-6 text-neutral-10 max-w-4xl mx-auto">Formulir ini dirancang untuk warga RW 04
                Kalirejo yang ingin mengajukan laporan pengaduan atau memberikan saran terkait masalah yang dihadapi,
                seperti fasilitas umum, keamanan, atau isu-isu lainnya. Melalui formulir ini, warga dapat memberikan
                informasi secara lengkap dan terstruktur, yang akan membantu dalam proses penyelesaian masalah dan
                peningkatan kualitas pelayanan di wilayah RW 04 Kalirejo.</p>
        </div>
    </header>

    <div class="container mx-auto mt-2">
        @if ($message = Session::get('error'))
            <div id="alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-auto w-1/2"
                role="alert">
                <strong class="font-bold">Ops!</strong>
                <span class="block sm:inline">{{ $message }}</span>
                <!-- Tombol Close -->
                <span id="close-btn" class="absolute top-0 right-0 px-2 py-1 cursor-pointer">&times;</span>
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div id="alert"
                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mx-auto w-1/2"
                role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ $message }}</span>
                <!-- Tombol Close -->
                <span id="close-btn" class="absolute top-0 right-0 px-2 py-1 cursor-pointer">&times;</span>
            </div>
        @endif
    </div>
    <div class="bg-white mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="flex justify-between mb-12 gap-3">
            <div class="flex gap-3">
                <div class=" drop-shadow-md">
                    <form action="{{ route('laporan.penduduk.index') }}" method="GET" class=" max-w-sm mx-auto">
                        @include('component.search')
                    </form>
                </div>

                {{-- <div class="rounded-full border border-neutral-04 shadow drop-shadow-md ">
                    <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown"
                        class="py-2 text-black font-medium text-sm px-5 text-center inline-flex items-center"
                        type="button">-
                        Status -
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                </div>

                <!-- Dropdown menu -->

                <div id="statusDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="statusDropdownButton">
                        <li>
                            <a href="{{ route('laporan.penduduk.index', ['status' => '']) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">-Semua-</a>
                        </li>
                        <li>
                            <a href="{{ route('laporan.penduduk.index', ['status' => 'Selesai']) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Selesai</a>
                        </li>
                        <li>
                            <a href="{{ route('laporan.penduduk.index', ['status' => 'Proses']) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Proses</a>
                        </li>
                        <li>
                            <a href="{{ route('laporan.penduduk.index', ['status' => 'Menunggu']) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Menunggu</a>
                        </li>
                    </ul>
                </div> --}}

            </div>
            <a href="{{ route('laporan.penduduk.create') }}"
                class="text-white bg-blue-main px-8 py-2 font-semibold text-base rounded-full drop-shadow-button hover:bg-dodger-blue-800">Ajukan</a>
        </div>

        <div class="mt-5 overflow-x-auto shadow-md rounded-lg mb-56">
            <table class="text-sm text-left shadow-xl w-full">
                <thead class="text-xs text-white bg-dodger-blue-950">
                    <tr>
                        <th class="px-6 py-4">
                            No
                        </th>
                        <th class="px-6 py-4">
                            Tanggal Pengajuan
                        </th>
                        <th class="px-6 py-4">
                            Nama Pengaju
                        </th>
                        <th class="px-6 py-4">
                            Deskripsi Pengaduan
                        </th>
                        <th class="px-6 py-4">
                            Status
                        </th>
                        <th class="px-6 py-4">

                        </th>
                    </tr>
                </thead>
                <tbody>

                    @if ($laporan->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center py-4">Tidak ada data yang tersedia</td>
                        </tr>
                    @endif

                    @foreach ($laporan as $lap)
                        <tr class="font-medium text-sm">
                            <td scope="row" class="px-6 py-4 whitespace-nowrap dark:text-white">
                                {{ $lap->laporan_id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $lap->tanggal_laporan }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $lap->penduduk->nama_penduduk }}
                            </td>
                            <td class="px-6 py-4 max-w-xl overflow-hidden">
                                <div class="line-clamp-4">{{ $lap->deskripsi_laporan }}</div>
                            </td>
                            @if ($lap->status_laporan === 'Sukses')
                                <td class="px-6 py-4">
                                    <div
                                        class="bg-green-100 text-green-600 font-bold py-2 px-4 text-xs rounded-full flex items-center gap-1">
                                        <div class="bg-green-600 rounded-full w-2 h-2"></div>
                                        <p>Selesai</p>
                                    </div>
                                </td>
                            @elseif ($lap->status_laporan === 'Proses')
                                <td class="px-6 py-4">
                                    <div
                                        class="bg-blue-info-100 text-blue-main font-bold py-2 px-4 text-xs rounded-full flex items-center gap-1">
                                        <div class="bg-blue-main rounded-full w-2 h-2"></div>
                                        <p>Proses</p>
                                    </div>
                                </td>
                            @else
                                <td class="px-6 py-4">
                                    <div
                                        class="bg-yellow-100 text-yellow-400 font-bold py-2 px-4 text-xs rounded-full flex items-center gap-1">
                                        <div class="bg-yellow-400 rounded-full w-2 h-2"></div>
                                        <p>Menunggu</p>
                                    </div>
                                </td>
                            @endif
                            <td class="px-6 py-4">
                                <div x-cloak x-data="{ open: false }">
                                    <button @click="open = true"
                                        class="px-6 py-3 bg-dodger-blue-100 rounded-full font-bold text-dodger-blue-950 hover:bg-blue-main hover:text-white">
                                        Detail
                                    </button>

                                    {{-- Main modal --}}
                                    <div x-show="open" tabindex="-1" aria-hidden="true"
                                        class="overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-black bg-opacity-80">
                                        <div class="relative w-[920px] max-h-full bg-white rounded-lg px-6 py-5">
                                            <button type="button" @click="open = false"
                                                class="absolute -top-5 -right-4 bg-blue-main text-white border-2 border-white hover:bg-gray-200 hover:text-gray-900 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <h2 class="text-2xl font-bold mb-6">Detail Pengaduan</h2>
                                            <form action="" class="">
                                                <div class="grid gap-4 mb-4 grid-cols-2">
                                                    <div class="col-span-2">
                                                        <label for="name"
                                                            class="block mb-2 text-sm font-medium text-neutral-06 dark:text-white">Tanggal
                                                            Pengaduan</label>
                                                        <input readonly type="text" name="name" id="name"
                                                            class=" border border-neutral-04 text-neutral-10 text-sm rounded-lg focus:outline-none block w-full p-2.5"
                                                            value="{{ $lap->tanggal_laporan }}">
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="name"
                                                            class="block mb-2 text-sm font-medium text-neutral-06 dark:text-white">Nama</label>
                                                        <input readonly type="text" name="name" id="name"
                                                            class=" border border-neutral-04 text-neutral-10 text-sm rounded-lg focus:outline-none block w-full p-2.5"
                                                            value="{{ $lap->penduduk->nama_penduduk }}">
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="name"
                                                            class="block mb-2 text-sm font-medium text-neutral-06 dark:text-white">RT</label>
                                                        <input readonly type="text" name="name" id="name"
                                                            class=" border border-neutral-04 text-neutral-10 text-sm rounded-lg focus:outline-none block w-full p-2.5"
                                                            value="{{ $lap->penduduk->kartuKeluarga->rt_id }}">
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="deskripsi"
                                                            class="block mb-2 text-sm font-medium text-neutral-06 dark:text-white">Deskripsi
                                                            Pengaduan</label>
                                                        <textarea readonly type="text" name="deskripsi" id="deskripsi"
                                                            class=" border border-neutral-04 text-neutral-10 text-sm rounded-lg focus:outline-none block w-full p-2.5"
                                                            rows="6">
                                                            {{ $lap->deskripsi_laporan }}></textarea>
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="name"
                                                            class="block mb-2 text-sm font-medium text-neutral-06 dark:text-white">Foto Bukti Kejadian</label>
                                                        <input readonly type="text" name="name" id="name"
                                                            class=" border border-neutral-04 text-neutral-10 text-sm rounded-lg focus:outline-none block w-full p-2.5"
                                                            value="{{ $lap->tanggal_laporan }}">
                                                    </div>
                                                </div>
                                            </form>


                                            <!-- Add more modal content here -->
                                        </div>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
