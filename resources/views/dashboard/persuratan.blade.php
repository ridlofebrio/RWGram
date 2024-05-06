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
        <h2 class="text-xl ml-3" > {{count($persuratan)}} Laporan</h2>
        <div class="filter flex">
            <button class="px-6 py-3 border-2 border-neutral-400 rounded-full" ><i class="fa-solid fa-sliders"></i> Filter</button>
            <div class="search border-2 border-neutral-400 rounded-full px-3">
                <i class="fa-solid fa-magnifying-glass"></i>

                <input type="text" class="border-none bg-transparent" placeholder="search">  
            </div>
        </div>
    </div>        
<div class=" mt-5 overflow-x-auto shadow-md sm:rounded-lg ">
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
                       Aksi
                    </th>
                </tr>
            </thead>
            <tbody id="body">
                
                    @foreach ($persuratan as $persuratan)
                 <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$persuratan->persuratan_id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$persuratan->nomor_surat}}
                    </td>
                    <td class="px-6 py-4  " style="  white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    max-width: 150px; ">
                        {{$persuratan->keterangan}}
                    </td>
                    <td class="px-6 py-4">
                        {{$persuratan->tanggal_persuratan}}
                    </td>
                  
                
                    <td class="px-6 py-4 flex ">
    
                     
                        <div x-data="{ open: false }">
                            <button @click="open = true"  class="hover:border-none  before:absolute text-blue-main bg-dodger-blue-50 hover:bg-dodger-blue-100  px-8 py-2 text-base font-medium rounded-full  " type="button">
                                Detail
                              </button>
                              
                              <!-- Main modal -->
                              <div  x-show="open"   tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed  z-40 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                              
                                <div  class="absolute w-[920px] h-[80vh] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2  p-4  z-50 ">
                                      <!-- Modal content -->
                                      <div @click.outside="open = false" class="relative bg-white w-full  rounded-lg shadow dark:bg-gray-700">
                                          <!-- Modal header -->
                                          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                              <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Detail
                                              </h3>
                                              <button type="button" @click="open = false" class="absolute -top-5 -right-4 bg-blue-main   text-white border-2 border-white hover:bg-gray-200 hover:text-gray-900 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " >
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
                                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Surat</label>
                                                    <input readonly type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" value="{{$persuratan->nomor_surat}}" required="">
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pengaduan</label>
                                                    <input readonly type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" value="{{$persuratan->tanggal_persuratan}}" required="">
                                                </div>
                                                <div class="col-span-2">
                                                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                                                  <input readonly type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" value="{{$persuratan->penduduk->nama_penduduk}}" required="">
                                              </div>
                                              <div class="col-span-2">
                                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                                <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here"> {{$persuratan->keterangan}}</textarea>                    
                                            </div>
                                              
                                            
                                              
                                               
                                            </div>
                                           
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