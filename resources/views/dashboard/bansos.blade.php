@extends('dashboard.template')

@section('content')
<h1>Data Penerimaan Bantuan Sosial</h1>
<div class="text-sm px-5 overflow-x-auto py-5 font-medium text-center rounded-xl w-full bg-white text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
    <div class="flex mt-3 w-full justify-between items-center">
        <h2 class="text-xl ml-3">{{ $allData->where('status', 'menunggu')->count() }} Permohonan</h2>
        <div class="filter flex space-x-2 items-center">

            <div x-data="{ open: false }" class="relative">
                <button @click="open= !open" class="flex w-[150px] hover:bg-blue-main hover:border-blue-main hover:text-white px-3 items-center space-x-5 py-2 border-2 border-neutral-400 rounded-full"><i class="fa-solid fa-sliders"></i> <p>-semua-</p> <i class="fa fa-chevron-down"></i></button>
                <div class="absolute left-1/2 -translate-x-1/2 px-3 py-3 z-30 bg-white drop-shadow-card" x-show="open" @click.outside="open=false">
                    <ul>
                        <li><button>date</button></li>
                        <li><button>status</button></li>
                        <li><button>1</button></li>
                    </ul>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <!-- Button to open modal -->
                <div x-data="{ open: false }">
                    <button @click="open = true" class="flex hover:bg-blue-main hover:border-blue-main hover:text-white px-3 items-center space-x-3 py-2 border-2 border-neutral-400 rounded-full">
                        <i class="fa-solid fa-sync"></i>
                        <p>Normalize</p>
                    </button>



                    <!-- Main modal -->
                    <div x-show="open" x-cloak tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed z-40 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="absolute w-[400px] h-[30vh] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 p-4 z-50">
                            <!-- Modal content -->
                            <div @click.outside="open = false" class="relative bg-white w-full rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Input Jumlah Penerima Bansos
                                    </h3>
                                    <button type="button" @click="open = false" class="absolute -top-5 -right-4 bg-blue-main text-white border-2 border-white hover:bg-gray-200 hover:text-gray-900 rounded-full text-sm w-8 h-8 inline-flex justify-center items-center">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form action="{{ route('normalize') }}" method="POST" id="inputJumlahPenerimaForm" class="p-4">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="jumlah_penerima" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Penerima Bansos</label>
                                        <input type="number" id="jumlah_penerima" name="jumlah_penerima" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan jumlah penerima bansos" required>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40"></div>
                    </div>
                </div>
                <!-- Button to download PDF -->
                <a href="{{ route('generatePDF') }}" class="flex w-[210px] hover:bg-blue-main hover:border-blue-main hover:text-white px-3 items-center space-x-4 py-2 border-2 border-neutral-400 rounded-full">
                    <i class="fa-solid fa-file-pdf"></i> <p>Download PDF</p>
                </a>

                <div class="search border w-[70%] focus-within:ring-2 focus-within:ring-blue-main flex items-center justify-between bg-white rounded-full px-3">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" class="border-none bg-transparent" placeholder="cari apapun">
                </div>
            </div>
        </div>
    </div>
    <div class="relative mt-5 overflow-x-auto shadow-md sm:rounded-lg">
        <table id='umkm' class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-neutral-03 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Tanggal</th>
                    <th scope="col" class="px-6 py-3">NKK</th>
                    <th scope="col" class="px-6 py-3">Nama Pengaju</th>
                    <th scope="col" class="px-6 py-3">Keterangan</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody id="body">

                @foreach ($data as $bansos)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->iteration }}</th>
                        <td class="px-6 py-4">{{$bansos->tanggal_bansos}}</td>
                        <td class="px-6 py-4">{{$bansos->kartuKeluarga->kartuKeluarga->NKK}}</td>
                        <td class="px-6 py-4">{{$bansos->nama_pengaju}}</td>
                        <td class="px-6 py-4" style="text-transform: capitalize;">{{$bansos->status}}</td>
                        <td class="px-6 py-4 flex gap-2">
                            <div x-cloak x-data="{ open: false }">
                                <button @click="open = true" class="hover:border-none before:absolute text-blue-main bg-dodger-blue-50 hover:bg-dodger-blue-100 px-8 py-2 text-base font-medium rounded-full" type="button">
                                    Detail
                                </button>
                                <!-- Main modal -->
                                <div x-show="open" tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed z-40 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="absolute w-[920px] h-[80vh] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 p-4 z-50">
                                        <!-- Modal content -->
                                        <div @click.outside="open = false" class="relative bg-white w-full rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Detail</h3>
                                                <button type="button" @click="open = false" class="absolute -top-5 -right-4 bg-blue-main text-white border-2 border-white hover:bg-gray-200 hover:text-gray-900 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form class="p-4 md:p-5">
                                                <div class="grid gap-4 mb-4 grid-cols-2">
                                                    <div class="col-span-2">
                                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pengajuan</label>
                                                        <input readonly type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" value="{{$bansos->tanggal_bansos}}" required="">
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                                        <input readonly type="text" name="name" id="name" class="bg-gray-50 border border-gray-300
                                                        @if($bansos->status == 'tidak menerima') text-red-500
                                                        @elseif($bansos->status == 'menunggu') text-yellow-500
                                                        @else text-green-500
                                                        @endif
                                                        text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        style="text-transform: capitalize;" placeholder="Type product name" value="{{$bansos->status}}" required="">
                                                    </div>

                                                  <div class="col-span-2">
                                                      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NKK</label>
                                                      <input readonly type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" value="{{$bansos->kartuKeluarga->kartuKeluarga->NKK}}" required="">
                                                  </div>
                                                  <div class="col-span-2">
                                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pengaju</label>
                                                    <input readonly type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" value="{{$bansos->nama_pengaju}}" required="">
                                                </div>
                                                @php
                                                    $count = 0;
                                                @endphp

                                                @foreach ($kriteria as $item)
                                                    @php
                                                        $count++;
                                                    @endphp
                                                    <div class="col-span-2">
                                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $item->nama_kriteria }}</label>
                                                        <input readonly type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" value="{{ $bansos['c'.$count] }}" required="">
                                                    </div>
                                                @endforeach
                                                                                                                <div class="col-span-2">
                                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Dapur </label>
                                                    <img src="{{asset('images/'.$bansos->foto_dapur)}}" alt="Foto Bukti">
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Depan Rumah</label>
                                                    <img src="{{asset('images/'.$bansos->foto_depan_rumah)}}" alt="Foto Bukti">
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Kamar Mandi</label>
                                                    <img src="{{asset('images/'.$bansos->foto_kamar_mandi)}}" alt="Foto Bukti">
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Kamar Tidur</label>
                                                    <img src="{{asset('images/'.$bansos->foto_kamar_tidur)}}" alt="Foto Bukti">
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Kamar Tamu</label>
                                                    <img src="{{asset('images/'.$bansos->foto_kamar_tamu)}}" alt="Foto Bukti">
                                                </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40"></div>
                                </div>
                            </div>
                            <form action="{{url('/bansos/'.$bansos->bansos_id)}}" onsubmit="return alert('are You sure ?')" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="hover:border-none  hover:bg-dodger-blue-100  px-8 py-2 text-base font-medium rounded-full  "><svg   xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path  stroke="#EE0B0B" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 5.98c-3.33-.33-6.68-.5-10.02-.5-1.98 0-3.96.1-5.94.3L3 5.98m5.5-1.01.22-1.31C8.88 2.71 9 2 10.69 2h2.62c1.69 0 1.82.75 1.97 1.67l.22 1.3m3.35 4.17-.65 10.07C18.09 20.78 18 22 15.21 22H8.79C6 22 5.91 20.78 5.8 19.21L5.15 9.14m5.18 7.36h3.33m-4.16-4h5"/>
                                  </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <nav aria-label="page navigation example" class="page mt-5 text-right" >
        <ul class="inline-flex -space-x-px text-sm">
          <li>
            <button {{$data->previousPageUrl()?'':'disabled'}} onclick="page(event,'{{$data->previousPageUrl()}}')" class="pagination disabled:bg-neutral-04  flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><i class="fa-solid fa-chevron-left"></i></button>
          </li>
          <li>
            <a href="#" class=" flex items-center justify-center px-3 h-8 bg-blue-main leading-tight  text-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{$data->currentPage()}}</a>
          </li>

          <li>
            <button  {{$data->nextPageUrl()?'':'disabled'}}  onclick="page(event,'{{$data->nextPageUrl()}}')" class="pagination disabled:bg-neutral-04  flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><i class="fa-solid fa-chevron-right"></i></button>
          </li>
        </ul>
    </nav>
</div>

{{-- Data Kriteria --}}
<h1 class="mt-3">Data Kriteria</h1>
<div class="text-sm px-5 overflow-x-auto py-5 font-medium text-center rounded-xl w-full bg-white text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
    <div class="filter flex space-x-2 items-center">
        <div class="search border w-[30%] focus-within:ring-2 focus-within:ring-blue-main flex items-center justify-between  bg-white rounded-full px-3">
            <input id="search" data='umkm' type="text" class=" border-none bg-transparent" placeholder="cari apapun">
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        <div  x-data="{open:false}" class="relative" x-cloak >
            <button @click="open= !open" class="flex px-3 items-center hover:bg-blue-main hover:border-blue-main hover:text-white space-x-5 py-2 border-2 w-min border-neutral-400 rounded-full" ><i class="fa-solid fa-sliders"></i> <p id="sort" class="w-[100px]">Filter</p> <i class="fa fa-chevron-down"></i></button>
            <div class="absolute  left-1/2 -translate-x-1/2 w-min z-30 bg-white drop-shadow-card" x-show="open"  @click.outside="open=false" >
               <ul>
                <li><button @click="open= !open"  data="semua" value="Semua" class="sort hover:bg-blue-main hover:text-white py-2 w-[200px]" >Semua</button></li>
                <li><button @click="open= !open"  data="benefit" value="Benefit" class="sort hover:bg-blue-main hover:text-white py-2 w-[200px]" >Benefit</button></li>
                <li><button @click="open= !open"  data='cost' value="Cost" class="sort hover:bg-blue-main hover:text-white py-2 w-[200px]">Cost</button></li>
               </ul>
            </div>
        </div>
    </div>
    <div class="relative mt-5 overflow-x-auto shadow-md sm:rounded-lg">
        <table id='umkm' class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-neutral-03 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Nama Kriteria</th>
                    <th scope="col" class="px-6 py-3">Bobot</th>
                    <th scope="col" class="px-6 py-3">Attribute</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody id="body">

                @foreach ($kriteria as $data)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->iteration }}</th>
                        <td class="px-6 py-4" style="text-transform: capitalize;">{{$data->nama_kriteria}}</td>
                        <td class="px-6 py-4">{{ number_format($data->bobot, 2) }}</td>
                        <td class="px-6 py-4" style="text-transform: capitalize;">{{$data->attribut}}</td>
                        <td class="px-6 py-4 flex gap-2">
                            <div x-cloak x-data="{ open: false }">
                                <button @click="open = true" class="hover:border-none before:absolute text-blue-main bg-dodger-blue-50 hover:bg-dodger-blue-100 px-8 py-2 text-base font-medium rounded-full" type="button">
                                    Edit
                                </button>
                                <!-- Main modal -->
                                <div x-show="open" tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed z-40 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="absolute w-[920px] h-[80vh] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 p-4 z-50">
                                        <!-- Modal content -->
                                        <div @click.outside="open = false" class="relative bg-white w-full rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Kriteria</h3>
                                                <button type="button" @click="open = false" class="absolute -top-5 -right-4 bg-blue-main text-white border-2 border-white hover:bg-gray-200 hover:text-gray-900 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form action="{{ url('/kriteria/'.$data->kriteria_id) }}" method="POST" class="p-4 md:p-5 text-left">
                                                @csrf
                                                @method('PUT')
                                                <div class="grid gap-4 mb-4 grid-cols-2">
                                                    <div class="col-span-2">
                                                        <label for="nama_kriteria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kriteria</label>
                                                        <input type="text" name="nama_kriteria" id="nama_kriteria" value="{{ $data->nama_kriteria }}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" style="text-transform: capitalize;" placeholder="Nama Kriteria" required>
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="bobot" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bobot</label>
                                                        <input type="number" step="0.01" name="bobot" id="bobot" value="{{ number_format($data->bobot, 2) }}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Bobot" required>
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="attribut" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Attribut</label>
                                                        <input type="text" name="attribut" id="attribut" value="{{ $data->attribut }}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" style="text-transform: capitalize;" placeholder="Attribut" required>
                                                    </div>
                                                </div>
                                                <button class="hover:border-none before:absolute text-blue-main bg-dodger-blue-50 hover:bg-dodger-blue-100 px-8 py-2 text-base font-medium rounded-full" type="submit">
                                                    Simpan
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40"></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('js')
<script>
    function page(event,link) {

               event.preventDefault()
               $.ajax({
                               url: link,
                               beforeSend: function() {
                     $("#loading-image").show();
                  },
                  success:function(data){
                   const parser = new DOMParser();
                               const doc = parser.parseFromString(data, 'text/html');
                               const table = doc.getElementById('umkm');
                               const page =doc.querySelector('.page');
                               console.log(page);
                                  $('#umkm').html(table);
                                  $('.page').html(page);
                               $("#loading-image").hide();
                  }

                           })
              }

    function submitForm() {
        let jumlahPenerima = document.getElementById('jumlah_penerima').value;
        document.getElementById('jumlah_penerima_hidden').value = jumlahPenerima;

        document.getElementById('normalizeButton').classList.remove('hidden');
        document.getElementById('inputJumlahPenerimaForm').submit();
    }
</script>
@endpush
