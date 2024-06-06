@extends('layouts.template')

@section('content')
    <header class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl font-extrabold text-neutral-10">Status Nikah</h1>
            <p class="mt-6 font-normal leading-6 text-neutral-10 max-w-4xl mx-auto">Formulir ini dirancang untuk warga RW 04
                Kalirejo yang ingin mengajukan perubahan status pernikahan. Melalui formulir ini, warga dapat memberikan
                informasi terkait perubahan status nikah yang diinginkan, seperti pernikahan baru, perceraian, atau
                perubahan status lainnya.</p>
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
        <div class="flex flex-wrap justify-end md:justify-between mb-12 gap-3">
            <div class="flex gap-3 z-40 relative  justify-between md:justify-normal w-full md:w-[80%] drop-shadow-lg">

                <form class="w-full md:max-w-md  action="{{ route('nikah.penduduk.find') }}" method="GET">
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input name="search" value="{{ request('search') }}"
                            class="pl-8 block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cari pengaduan" required />
                    </div>
                </form>

                <div class="h-full">
                    <button id="statusDropdownButton" data-dropdown-toggle="statusDropdown"
                        class="p-2 font-medium text-sm h-full text-gray-600 px-4 text-center inline-flex items-center rounded-full bg-white "
                        type="button">
                        <i class="md:hidden fa-solid fa-filter"></i>
                        <p class="hidden md:block">{{ request('status') ? request('status') : '-Semua-' }}</p>
                        <svg class="hidden md:block  w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                </div>

                <!-- Dropdown menu -->
                <div id="statusDropdown"
                    class="z-50 top-0 hidden  bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="statusDropdownButton">
                        <li>
                            <a href="{{ route('nikah.penduduk.index', ['status' => '']) }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">-Semua-</a>
                        </li>
                        <li>
                            <a href="{{ route('nikah.penduduk.index', ['status' => 'diterima']) }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Selesai</a>
                        </li>
                        <li>
                            <a href="{{ route('nikah.penduduk.index', ['status' => 'Menunggu']) }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Menunggu</a>
                        </li>
                    </ul>
                </div>

            </div>
            <a href="{{ route('nikah.penduduk.create') }}"
                class="text-white bg-blue-main px-8 py-2 font-semibold text-base rounded-full drop-shadow-button relative z-10 hover:bg-dodger-blue-800">Ajukan</a>
        </div>

        <div class="mt-5 overflow-x-auto shadow-md rounded-lg mb-56">
            <table class="text-sm text-left shadow-xl w-full">
                <thead class="text-xs text-white bg-dodger-blue-950 ">
                    <tr>
                        <th class="px-6 py-4">
                            No
                        </th>
                        <th class="px-6 py-4">
                            Nama Pengaju
                        </th>
                        <th class="px-6 py-4">
                            Tanggal Pengajuan
                        </th>
                        <th class="px-6 py-4">
                            Status
                        </th>
                        <th class="px-6 py-4">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($nikah->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center py-4">Tidak ada data yang tersedia</td>
                        </tr>
                    @endif
                    @foreach ($nikah as $item)
                        <tr class="font-medium text-sm">
                            <td scope="row" class="px-6 py-4 whitespace-nowrap dark:text-white">
                                {{ $item->id_status_nikah }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->penduduk->nama_penduduk }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->created_at }}
                            </td>
                            @if ($item->status_pengajuan === 'diterima')
                                <td class="px-6 py-4">
                                    <div
                                        class="bg-green-100 text-green-600 font-bold py-2 px-4 text-xs rounded-full flex items-center gap-2 w-fit">
                                        <div class="bg-green-600 rounded-full w-2 h-2"></div>
                                        <p>Selesai</p>
                                    </div>
                                </td>
                            @elseif ($item->status_pengajuan === 'ditolak')
                                <td class="px-6 py-4">
                                    <div
                                        class="bg-blue-info-100 text-red-500 font-bold py-2 px-4 text-xs rounded-full flex items-center gap-2 w-fit">
                                        <div class="bg-red-500 rounded-full w-2 h-2"></div>
                                        <p>Proses</p>
                                    </div>
                                </td>
                            @else
                                <td class="px-6 py-4">
                                    <div
                                        class="bg-yellow-100 text-yellow-400 font-bold py-2 px-4 text-xs rounded-full flex items-center gap-2 w-fit">
                                        <div class="bg-yellow-400 rounded-full w-2 h-2"></div>
                                        <p>Menunggu</p>
                                    </div>
                                </td>
                            @endif

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                <ul class="pagination">
                    {{ $nikah->links('vendor.pagination.tailwind') }}
                </ul>
            </div>
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
