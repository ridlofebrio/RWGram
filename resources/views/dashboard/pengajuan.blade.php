@extends('dashboard.template')

@section('content')


<div class="text-sm px-5 overflow-x-auto py-5 font-medium text-center rounded-xl w-full bg-white  text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul x-data="{active: 'umkm'}" class="flex overflow-x-auto -mb-px">
            <li class="me-2">
                <button   @click="active = 'umkm'"  :class="active=='umkm' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300':'tab inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"   data="umkm" >UMKM</button>
            </li>
            <li class="me-2">
                <button @click="active = 'nikah'"  data="nikah"  :class="active=='nikah' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300':'tab inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"  data="umkm" aria-current="page">Status Nikah</button>
            </li>
            <li class="me-2">
                <button @click="active = 'tinggal'"  data="tinggal" :class="active=='tinggal' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300':'tab inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"  data="umkm">Status Tempat Tinggal</button>
            </l px-3i>
            <li class="me-2">
                <button @click="active = 'meninggal'"  data="meninggal"  :class="active=='meninggal' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300':'tab inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"  data="umkm">Status Meninggal</button>
            </li>
           

        </ul>

    <div class="flex w-full justify-between items-center">
        <h2>2 permohonan</h2>
        <div class="filter flex space-x-2">
               
            <div x-data="{open:false}" class="relative " >
                <button @click="open= !open" class="flex px-3 items-center space-x-5 py-2 border-2 border-neutral-400 rounded-full" ><i class="fa-solid fa-sliders"></i> <p>-semua-</p> <i class="fa fa-chevron-down"></i></button>
                <div class="absolute mt-1  left-1/2 -translate-x-1/2 p-0 z-30 bg-white drop-shadow-card w-full" x-show="open" @click.outside="open=false" >
                   <ul>
                    <li><button class="hover:bg-blue-main px-5 py-2 w-full" >date</button></li>
                    <li><button class="hover:bg-blue-main px-5 py-2 w-full" >status</button></li>
                    <li><button class="hover:bg-blue-main px-5 py-2 w-full"  >1</button></li>
                    
                   </ul>
                </div>
            </div>
          
            <div class="border-2 bg-neutral-04 rounded-full px-3">
                <i class="fa-solid fa-magnifying-glass"></i>

                <input type="text" id="search" data='umkm' class="border-none bg-transparent" placeholder="cari apapun">  
            </div>
        </div>
    </div>        
    <div id="loading-image" class="absolute top-1/2 left-1/2 flex justify-center items-center -translate-x-1/2 -translate-y-1/2 z-40 w-screen h-screen bg-black opacity-70" style="display: none;" ><h1 class=" bg-white px-5 py-5" >Loading</h1></div>
<div class="relative mt-5 overflow-x-auto shadow-md sm:rounded-lg ">
        <table id="umkm" class="w-full text-sm text-left rtl:text-right  text-gray-500 dark:text-gray-400">
           
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
                    
                        @foreach ($umkm as $umkm)
                     <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$umkm->umkm_id}}
                        </th>
                        <td class="px-6 py-4">
                            {{$umkm->tanggal_umkm}}
                        </td>
                        <td class="px-6 py-4">
                            {{$umkm->penduduk->nama_penduduk}}
                        </td>
                        <td class="px-6 py-4">
                            {{$umkm->nama_umkm}}
                        </td>
                        <td class="px-6 py-4">
                            <div class="px-2 py-2  bg-[#CCF1E5] rounded-full flex items-center gap-2 justify-center">
                                    <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                    <p class="font-body font-semibold text-green-400">
            
                                            Selesai
            
                                    </p>
                            </div>
                        </td>
                    
                        <td class="px-6 py-4 flex gap-2 ">
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
    <script>
        // let button = document.querySelectorAll('.tab');
        // console.log(button)
            $(document).ready(function(){
                $('.tab').click(function(index){
                    $.ajax({
                        url: "http://127.0.0.1:8000/data/"+index.currentTarget.getAttribute('data'),
                        beforeSend: function() {
              $("#loading-image").show();
           },
                        
                    }).done(function (data) {
                     
                        $('#umkm').html(data);
                        $("#loading-image").hide();
                        $('#search').attr("data",index.currentTarget.getAttribute('data'));
                    })
                    
                })

                $('#search').keyup(function () {
                    let data = ($(this).val())
                    if(data == null || data == ""){
                        data='kosong';
                    }
                    console.log(data);
                    
                  
                    $.ajax({
                        url: "http://127.0.0.1:8000/search/"+document.querySelector('#search').getAttribute('data')+'/'+data,
                        async:false,
                        
                    }).done(function (data) {    
                        $('#umkm').html(data)   
                    })

                })
                
            })
    </script>
@endpush