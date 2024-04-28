@extends('dashboard.template')

@section('content')

@push('css')
<style>
    input:focus{
      outline:none !important;
      outline-width: 0 !important;
      box-shadow: none !important;
      -moz-box-shadow: none!important;
      -webkit-box-shadow: none!important;
    }
  
    
  </style>
@endpush

<div class="text-sm px-5 overflow-x-auto py-5 font-medium text-center rounded-xl w-full bg-white  text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        
    <div class="flex w-full justify-between items-center">
        <h2 class="text-xl ml-3" > {{count($data)}} Laporan</h2>
        <div class="filter flex">
            <button class="px-6 py-3 border-2 border-neutral-400 rounded-full" ><i class="fa-solid fa-sliders"></i> Filter</button>
            <div class="search border-2 border-neutral-400 rounded-full px-3">
                <i class="fa-solid fa-magnifying-glass"></i>

                <input type="text" class="border-none bg-transparent" placeholder="search">  
            </div>
        </div>
    </div>        
<div class="relative mt-5 overflow-x-auto shadow-md sm:rounded-lg ">
        <table id='umkm' class="w-full text-sm text-left rtl:text-right  text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-neutral-03 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama UMKM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                       Aksi
                    </th>
                </tr>
            </thead>
            <tbody id="body">
                
                    @foreach ($data as $umkm)
                 <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$umkm->penduduk_id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$umkm->jenis_laporan}}
                    </td>
                    <td class="px-6 py-4  " style="  white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    max-width: 150px; ">
                        {{$umkm->deskripsi_laporan}}
                    </td>
                    <td class="px-6 py-4">
                        {{$umkm->tanggal_laporan}}
                    </td>
                    <td class="px-6 py-4">
                        <div class="px-2 py-2 w-[113px] {{$umkm->status_laporan=='selesai'? 'bg-[#CCF1E5]':'bg-[#FBF4CF]'}}  rounded-full flex items-center gap-2  justify-center">
                                <div class="w-2 h-2 {{$umkm->status_laporan=='selesai'? 'bg-green-400':'bg-yellow-300'}} rounded-full"></div>
                                <p class="font-body font-semibold {{$umkm->status_laporan=='selesai'? 'text-green-400':'text-yellow-300'}}">

                                        {{$umkm->status_laporan}}

                                </p>
                        </div>
                    </td>
                
                    <td class="px-6 py-4 ">
                        <a href="/login" class="text-red-500 border-2 border-red-500  hover:bg-red-500 hover:text-white   px-8 py-2 text-base font-medium rounded-full  ">Tolak</a>
                        <a href="/login" class="text-neutral-01 bg-blue-main hover:bg-dodger-blue-800   px-5 py-2 text-base font-medium rounded-full  ">Konfirmasi</a>
                        <a href="/login" class="hover:border-none   text-blue-main bg-dodger-blue-50 hover:bg-dodger-blue-100  px-8 py-2 text-base font-medium rounded-full  ">Detail</a>
                    </td>
                    
                </tr>
                    @endforeach
                  
             
               
            </tbody>
        </table>
       
    </div>
    <nav aria-label="Page navigation example" class="mt-5 text-right" >
        <ul class="inline-flex -space-x-px text-sm">
          <li>
            <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><i class="fa-solid fa-chevron-left"></i></a>
          </li>
          <li>
            <a href="#" class="flex items-center justify-center px-3 h-8 bg-blue-main leading-tight  text-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
          </li>
          <li>
            <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
          </li>
          <li>
            <a href="#" class="flex items-center justify-center px-3 h-8  leading-tight  text-gray-500 border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
          </li>
          <li>
            <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><i class="fa-solid fa-chevron-right"></i></a>
          </li>
        </ul>
      </nav>
</div>
    
  
    </div>
    

@endsection

@push('js')
    {{-- <script>
        // let button = document.querySelectorAll('.tab');
        // console.log(button)
            $(document).ready(function(){
                $('.tab').click(function(){
                    $('#umkm').css({
                        "display":"none"
                    })

                    $.ajax({
                        url: "http://127.0.0.1:8000/coba"
                        
                    }).done(function (data) {
                        $('#umkm').css({
                        "display":"table"
                    })
                    data.forEach(element => {
                        $('#body').append('<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"><td class="px-6 py-4" >'+element.nama_penduduk+'</td></tr>');
                    });
                    })
                })
                
            })
    </script> --}}
@endpush