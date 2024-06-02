@extends('dashboard.template')

@section('content')
<div class="text-sm px-5 overflow-x-auto py-5 font-medium text-center rounded-xl w-full bg-white  text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
    <div class="w-full flex justify-between">
        <h1 class=" font-semibold mb-5 text-black  text-2xl" >Informasi</h1>
        
        <button id="tambah" data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-neutral-01 bg-blue-main hover:bg-dodger-blue-800   px-8 py-2 text-base font-medium rounded-full  " type="button">
            Tambah
          </button>
          <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[70] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div  class="relative p-4  w-[900px] h-[80vh]">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center  justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Create New Product
                        </h3>
                        <button type="button" class="absolute -top-5 -right-4 bg-blue-main   text-white border-2 border-white hover:bg-gray-200 hover:text-gray-900 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-toggle="crud-modal">
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                          </svg>
                          <span class="sr-only">Close modal</span>
                      </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{route('informasi.tambah.informasi')}}" method="POST" class="p-4 md:p-5 text-left">
                      @csrf
                      @method('POST')
                        <div id="list" class="  mb-4">
                            
                           
                            
                       
                            
                        </div>
                        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div> 
        
        

    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 w-full gap-4 mt-5" >
        @foreach ($pengumuman as $item)
      <button class="hover:scale-75 mx-auto transition ease-in-out delay-150 " onclick="openModal({{$item->informasi_id}})">
        <section class="relative max-w-full  ">
            <div class=" duration-700 ease-in-out" data-carousel-item>
                <div class="absolute font-main  w-full z-40 h-full">
                  <div class=" text-left flex flex-col justify-end px-3 py-7  w-full h-full">
                      <h2 class="text-white text-md lg:text-lg " >Sistem Informasi RW 06 - Kalirejo </h2>
                      <h1 class=" text-md  font-bold lg:text-lg  text-white w-3/4" >{{$item->judul}} </h1>
                     
              </div>
            </div>
            <div class="bg-gradient-to-t from-[#0096FF] opacity-50 rounded-xl  to-transparent to-70%   z-30 absolute w-full h-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"></div>
                  <img src="{{$item->foto_informasi}}" class=" block rounded-xl w-full object-cover top-0 left-0" alt="...">
              </div>
              
          </section>
      </button>
      <div  id="modal-{{$item->informasi_id}}"  tabindex="-1" aria-hidden="true" class="hidden modal overflow-y-auto overflow-x-hidden fixed  z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                              
        <div  class="absolute w-[920px] h-[80vh] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2  p-4  z-50 ">
              <!-- Modal content -->
              <div  class="relative bg-white w-full  rounded-lg shadow dark:bg-gray-700">
                  <!-- Modal header -->
                  <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Detail
                      </h3>
                      <button  type="button"  onclick="closeModal({{$item->informasi_id}})" class="absolute -top-5 -right-4 bg-blue-main   text-white border-2 border-white hover:bg-gray-200 hover:text-gray-900 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " >
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                          </svg>
                          <span class="sr-only">Close modal</span>
                      </button>
                  </div>
                  <!-- Modal body -->
                  <form class="text-left p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Informasi</label>
                            <input readonly type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" value="{{$item->judul}}" required="">
                        </div>
                        <div class="col-span-2">
                          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                          <textarea readonly type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 h-[200px] focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">{{$item->deskripsi_informasi}} </textarea>
                      </div>
                      <div class="col-span-2">
                          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Informasi</label>
                          <input readonly type="date" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" value="{{date('Y-m-d',strtotime($item->deskripsi_informasi))}}" required="">
                      </div>
                      <div class="col-span-2">
                          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Informasi</label>
                         <a href="{{$item->foto_informasi}}"><img src="{{$item->foto_informasi}}" class="rounded-xl max-w-[500px]" alt=""></a>
                      </div>
                      
                      
                       
                    </div>
                   
                </form>

                <form action="{{url('/informasi/arsip/'.$item->informasi_id)}}" onsubmit="return alert('are You sure ?')" class="text-left px-5 py-3" method="post">
                    @csrf
                    
                    <button type="submit" class=" hover:bg-dodger-blue-100 hover:border-2 hover:text-white hover:border-dodger-blue-100 border-2 border-blue-main  px-8 py-2 text-base font-medium rounded-full  ">
                       <p class="font-bold text-blue-main"> Arsipkan</p>
                    </button>
                </form>
              </div>
          </div>
          <div class="bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40"></div> 
      </div> 

        @endforeach
    </div>
</div>

@endsection

@push('js')
    <script>

const openModal=(id)=>{
          
            let modal =document.getElementById('modal-'+id)
            modal.classList.remove('hidden');
     
         
        }


const closeModal = (id) => {
   
    document.querySelector('#modal-'+id).classList.add('hidden');
}


        $(document).ready(function(){
            $('#tambah').click(function(){
                $.ajax({
                    url:'{{url("karangTaruna/list")}}',
                    method:'GET',
                    dataType:'html',
                    success:function(data){
                            $('#list').html(data);
                            },
                    error:function(){

                    },

                })
            })
        })
    </script>
@endpush    