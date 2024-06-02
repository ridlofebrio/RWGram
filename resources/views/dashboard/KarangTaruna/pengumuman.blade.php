@extends('dashboard.template')

@section('content')
<div class="text-sm px-5 overflow-x-auto py-5 font-medium text-center rounded-xl w-full bg-white  text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
    <div class="w-full flex justify-between">
        <h1 class=" font-semibold mb-5 text-black  text-2xl" >Pengumuman</h1>
        
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-neutral-01 bg-blue-main hover:bg-dodger-blue-800   px-8 py-2 text-base font-medium rounded-full  " type="button">
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
                    <form action="{{url('/penduduk')}}" method="POST" class="p-4 md:p-5 text-left">
                      @csrf
                      @method('POST')
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                                <input type="text" name="NKK" id="name" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Deskripsi" required="">
                            </div>
                           
                            
                       
                            
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

    <div class=" w-full gap-4 mt-5" >
        @foreach ($informasi as $item)
        <div x-data="{ open: false }">
            <button @click="open = true" class="hover:scale-95 mx-auto transition ease-in-out delay-100">
                <div class="flex mt-4 w-full gap-5">
        
                    <img src="{{$item->foto_informasi}}" class="rounded-xl max-w-md" alt="">
                    <div class="content text-left">
                        <h1 class="font-bold text-2xl text-black">{{$item->judul}}</h1>
                        <p class="mt-4"> {{$item->deskripsi_informasi}}</p>
                        <p class="flex items-center gap-2 mt-4 "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path fill="#1B1B1B" d="M12 14.17c-2.13 0-3.87-1.73-3.87-3.87S9.87 6.44 12 6.44s3.87 1.73 3.87 3.87-1.74 3.86-3.87 3.86Zm0-6.23c-1.3 0-2.37 1.06-2.37 2.37s1.06 2.37 2.37 2.37 2.37-1.06 2.37-2.37S13.3 7.94 12 7.94Z"/>
                            <path fill="#1B1B1B" d="M12 22.76a5.97 5.97 0 0 1-4.13-1.67c-2.95-2.84-6.21-7.37-4.98-12.76C4 3.44 8.27 1.25 12 1.25h.01c3.73 0 8 2.19 9.11 7.09 1.22 5.39-2.04 9.91-4.99 12.75A5.97 5.97 0 0 1 12 22.76Zm0-20.01c-2.91 0-6.65 1.55-7.64 5.91C3.28 13.37 6.24 17.43 8.92 20a4.426 4.426 0 0 0 6.17 0c2.67-2.57 5.63-6.63 4.57-11.34-1-4.36-4.75-5.91-7.66-5.91Z"/>
                          </svg> {{$item->lokasi_informasi}}</p>
                          <p class="flex items-center gap-2 mt-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M8 2v3m8-3v3M3.5 9.09h17m.5-.59V17c0 3-1.5 5-5 5H8c-3.5 0-5-2-5-5V8.5c0-3 1.5-5 5-5h8c3.5 0 5 2 5 5Z"/>
                            <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.694 13.7h.009m-.009 3h.009m-3.708-3h.009m-.009 3h.009m-3.709-3h.01m-.01 3h.01"/>
                          </svg> {{$item->tanggal_informasi}} </p>
                    </div>
                </div>
               </button>
   
    
            <!-- Main modal -->
            <div x-show="open" x-cloak tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed z-40 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
               
                              
                    <div @click.outside="open = false" class="absolute w-[920px] h-[80vh] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2  p-4  z-50 ">
                          <!-- Modal content -->
                          <div  class="relative bg-white w-full  rounded-lg shadow dark:bg-gray-700">
                              <!-- Modal header -->
                              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Detail
                                  </h3>
                                  <button  type="button"  @click="open = false" class="absolute -top-5 -right-4 bg-blue-main   text-white border-2 border-white hover:bg-gray-200 hover:text-gray-900 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " >
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
        </div>
      
        @endforeach
    </div>
</div>

@endsection