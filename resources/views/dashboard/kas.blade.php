@extends('dashboard.template')

@section('content')



<div class="text-sm px-5 overflow-x-auto py-5 font-medium text-center rounded-xl w-full bg-white  text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
       
  <ul x-data="{active: 'pemasukan'}" class="flex overflow-x-auto -mb-px">
    <li class="me-2">
        <button   @click="active = 'pemasukan'"  :class="active=='pemasukan' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300':'tab inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"   data="pemasukan" >Pemasukan</button>
    </li>
    <li class="me-2">
      <button   @click="active = 'pengeluaran'"  :class="active=='pengeluaran' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300':'tab inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"   data="pengeluaran" >Pengeluaran</button>
  </li>
   

</ul>
<hr>

{{-- chart --}}
  <div class="w-full mt-5 border-2 border-neutral-02 bg-white rounded-lg shadow dark:bg-gray-800">
    <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
     
      
    </div>


    <div id="labels-chart" class="px-2.5"></div>
    
  </div>

   {{-- end chart --}}


   <div class="flex mt-3 w-full justify-between items-center">
        
        
        
          

    

  <div class="filter flex space-x-2 mt-5 items-center">
     
      <div  x-data="{open:false}" class="relative" x-cloak >
          <button @click="open= !open" class="flex px-3 w-[150px] hover:bg-blue-main hover:border-blue-main hover:text-white items-center space-x-5 py-2 border-2 border-neutral-400 rounded-full" ><i class="fa-solid fa-sliders"></i> <p>-semua-</p> <i class="fa fa-chevron-down"></i></button>
          <div class="absolute left-1/2 -translate-x-1/2  px-3 py-3 z-30 bg-white drop-shadow-card" x-show="open" @click.outside="open=false" >
             <ul>
              <li><button data="semua" class="sort" >Semua</button></li>
              <li><button data="L" class="sort" >laki-laki</button></li>
              <li><button data='P' class="sort" >Perempuan</button></li>
              
              
             </ul>
          </div>
      </div>
      <div class="search border w-[70%] focus-within:ring-2 focus-within:ring-blue-main flex items-center justify-between  bg-white rounded-full px-3">
          <i class="fa-solid fa-magnifying-glass"></i>

          <input id="search" type="text" class="border-none bg-transparent" placeholder="cari apapun">  
      </div>
  </div>
  <div class="flex space-x-1">
      <div x-data="{ open: false }">
          
          <button @click="open= ! open" type="submit"   class="flex border-2 px-8 py-2  rounded-full justify-between space-x-2 items-center hover:bg-blue-main hover:border-blue-main ">

              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path fill="#1B1B1B" d="M13 11.748c-.19 0-.38-.07-.53-.22a.754.754 0 0 1 0-1.06l8.2-8.2c.29-.29.77-.29 1.06 0 .29.29.29.77 0 1.06l-8.2 8.2c-.15.15-.34.22-.53.22Z"/>
                  <path fill="#1B1B1B" d="M22 7.55c-.41 0-.75-.34-.75-.75V2.75H17.2c-.41 0-.75-.34-.75-.75s.34-.75.75-.75H22c.41 0 .75.34.75.75v4.8c0 .41-.34.75-.75.75Zm-7 15.2H9c-5.43 0-7.75-2.32-7.75-7.75V9c0-5.43 2.32-7.75 7.75-7.75h2c.41 0 .75.34.75.75s-.34.75-.75.75H9C4.39 2.75 2.75 4.39 2.75 9v6c0 4.61 1.64 6.25 6.25 6.25h6c4.61 0 6.25-1.64 6.25-6.25v-2c0-.41.34-.75.75-.75s.75.34.75.75v2c0 5.43-2.32 7.75-7.75 7.75Z"/>
                </svg>
                
                <p class="text-black font-semibold">Import CSV</p>
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
                    <form class="p-4 md:p-5 text-left" action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="col-span-2">
                          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File :</label>
                          <input  type="file" name="file" accept=".csv"  class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                      </div>
                      <hr>
                     
                      <button  class="text-neutral-01 bg-blue-main hover:bg-dodger-blue-800  mt-3  px-8 py-2 text-base font-medium rounded-full  " type="submit">
                          Tambah
                        </button>
                  </form>
                </div>
            </div>
            <div class="bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40"></div> 
        </div> 
          
      </div>
     
   
      <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-neutral-01 bg-blue-main hover:bg-dodger-blue-800   px-8 py-2 text-base font-medium rounded-full  " type="button">
          Tambah
        </button>
     
        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
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
                  <form action="{{url('/kas')}}" method="POST" class="p-4 md:p-5 text-left">
                    @csrf
                    @method('POST')
                      <div class="grid gap-4 mb-4 grid-cols-2">
                          <div class="col-span-2">
                              <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NKK</label>
                              <input type="text" name="NKK" id="name" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NKK" required="">
                          </div>
                          
                        
                        </div>

                          <div class="flex w-full justify-between">
                            <div class=" flex flex-col">
                              <label for="">Pilih</label>
                             <div class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <input class=" border border-gray-900 rounded-lg   focus:ring-primary-600 focus:border-primary-600 block  p-2.5 " type="checkbox" name='cek[]' value="januari" id="">
                             </div>
                            </div>
                            <div class=" flex flex-col">
                              <label for="">Bulan</label>
                              <input value="Januari" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="januari" name="januari[]" id="">
                            </div>
                            <div class=" flex flex-col">
                              <label for="">Tanggal</label>
                              <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="date" name="januari[]" id="">
                            </div>
                            <div class=" flex flex-col">
                              <label for="">Jumlah</label>
                              <input value="15000" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="number" name="januari[]" id="">
                            </div>
                          </div>

                          <div class="flex w-full justify-between mt-5">
                            <div class=" flex flex-col">
                            
                             <div class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <input class=" border border-gray-900 rounded-lg   focus:ring-primary-600 focus:border-primary-600 block  p-2.5 " type="checkbox" name='cek[]' value="februari"id="">
                             </div>
                            </div>
                            <div class=" flex flex-col">
                            
                              <input value="Februari" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="januari" name="februari[]" id="">
                            </div>
                            <div class=" flex flex-col">
                            
                              <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="date" name="februari[]" id="">
                            </div>
                            <div class=" flex flex-col">
                            
                              <input value="15000" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="number" name="februari[]" id="">
                            </div>
                          </div>

                          <div class="flex w-full justify-between mt-5">
                            <div class=" flex flex-col">
                            
                             <div class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <input class=" border border-gray-900 rounded-lg   focus:ring-primary-600 focus:border-primary-600 block  p-2.5 " type="checkbox" name='cek[]' value='maret' id="">
                             </div>
                            </div>
                            <div class=" flex flex-col">
                            
                              <input value="Maret" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="januari" name='maret[]' id="">
                            </div>
                            <div class=" flex flex-col">
                            
                              <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="date" name='maret[]' id="">
                            </div>
                            <div class=" flex flex-col">
                            
                              <input value="15000" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="number" name='maret[]' id="">
                            </div>
                          </div>

                          <div class="flex w-full justify-between mt-5">
                            <div class=" flex flex-col">
                            
                             <div class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <input class=" border border-gray-900 rounded-lg   focus:ring-primary-600 focus:border-primary-600 block  p-2.5 " type="checkbox" name='cek[]' value="april" id="">
                             </div>
                            </div>
                            <div class=" flex flex-col">
                            
                              <input value="April" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="januari" name="april[]" id="">
                            </div>
                            <div class=" flex flex-col">
                            
                              <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="date" name="april[]" id="">
                            </div>
                            <div class=" flex flex-col">
                            
                              <input value="15000" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="number" name="april[]" id="">
                            </div>
                          </div>


                          <div class="flex w-full justify-between mt-5">
                            <div class=" flex flex-col">
                            
                             <div class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <input class=" border border-gray-900 rounded-lg   focus:ring-primary-600 focus:border-primary-600 block  p-2.5 " type="checkbox" name='cek[]' value="mei" id="">
                             </div>
                            </div>
                            <div class=" flex flex-col">
                            
                              <input value="Mei" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="januari" name="mei[]" id="">
                            </div>
                            <div class=" flex flex-col">
                            
                              <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="date" name="mei[]" id="">
                            </div>
                            <div class=" flex flex-col">
                            
                              <input value="15000" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="number" name="mei[]" id="">
                            </div>
                          </div>
                          

                          <div class="flex w-full justify-between mt-5">
                            <div class=" flex flex-col">
                            
                             <div class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <input class=" border border-gray-900 rounded-lg   focus:ring-primary-600 focus:border-primary-600 block  p-2.5 " type="checkbox" name='cek[]' value="juni" id="">
                             </div>
                            </div>
                            <div class=" flex flex-col">
                            
                              <input value="Juni" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="januari" name="juni[]" id="">
                            </div>
                            <div class=" flex flex-col">
                            
                              <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="date" name="juni[]" id="">
                            </div>
                            <div class=" flex flex-col">
                            
                              <input value="15000" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="number" name="juni[]" id="">
                            </div>
                          </div>


                          <div class="flex w-full justify-between mt-5">
                            <div class=" flex flex-col">
                            
                             <div class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <input class=" border border-gray-900 rounded-lg   focus:ring-primary-600 focus:border-primary-600 block  p-2.5 " type="checkbox" name='cek[]' value="juli" id="">
                             </div>
                            </div>
                            <div class=" flex flex-col">
                            
                              <input value="Juli" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="januari" name="juli[]" id="">
                            </div>
                            <div class=" flex flex-col">
                            
                              <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="date" name="juli[]" id="">
                            </div>
                            <div class=" flex flex-col">
                            
                              <input value="15000" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="number" name="juli[]" id="">
                            </div>
                          </div>


                          <div class="flex w-full justify-between mt-5">
                            <div class=" flex flex-col">
                            
                             <div class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <input class=" border border-gray-900 rounded-lg   focus:ring-primary-600 focus:border-primary-600 block  p-2.5 " type="checkbox" name='cek[]' value="agustus" id="">
                             </div>
                            </div>
                            <div class=" flex flex-col">
                            
                              <input value="Agustus" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="januari" name="agustus[]" id="">
                            </div>
                            <div class=" flex flex-col">
                            
                              <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="date" name="agustus[]" id="">
                            </div>
                            <div class=" flex flex-col">
                            
                              <input value="15000" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="number" name="agustus[]" id="">
                            </div>
                          </div>

                          <div class="flex w-full justify-between mt-5">
                            <div class=" flex flex-col">
                            
                             <div class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <input class=" border border-gray-900 rounded-lg   focus:ring-primary-600 focus:border-primary-600 block  p-2.5 " type="checkbox" name='cek[]' value="september" id="">
                             </div>
                            </div>
                            <div class=" flex flex-col">
                            
                              <input value="September" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="januari" name="september[]" id="">
                            </div>
                            <div class=" flex flex-col">
                            
                              <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="date" name="september[]" id="">
                            </div>
                            <div class=" flex flex-col">
                            
                              <input value="15000" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="number" name="september[]" id="">
                            </div>
                          </div>


                          <div class="flex w-full justify-between mt-5">
                            <div class=" flex flex-col">
                            
                             <div class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <input class=" border border-gray-900 rounded-lg   focus:ring-primary-600 focus:border-primary-600 block  p-2.5 " type="checkbox" name='cek[]' value="oktober" id="">
                             </div>
                            </div>
                            <div class=" flex flex-col">
                            
                              <input value="Oktober" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="januari" name="oktober[]" id="">
                            </div>
                            <div class=" flex flex-col">
                            
                              <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="date" name="oktober[]" id="">
                            </div>
                            <div class=" flex flex-col">
                            
                              <input value="15000" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="number" name="oktober[]" id="">
                            </div>
                          </div>
                       

                          <div class="flex w-full justify-between mt-5">
                            <div class=" flex flex-col">
                            
                             <div class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <input class=" border border-gray-900 rounded-lg   focus:ring-primary-600 focus:border-primary-600 block  p-2.5 " type="checkbox" name='cek[]' value="november" id="">
                             </div>
                            </div>
                            <div class=" flex flex-col">
                            
                              <input value="November" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="januari" name="november[]" id="">
                            </div>
                            <div class=" flex flex-col">
                            
                              <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="date" name="november[]" id="">
                            </div>
                            <div class=" flex flex-col">
                            
                              <input value="15000" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="number" name="november[]" id="">
                            </div>
                          </div>


                          <div class="flex w-full justify-between mt-5">
                            <div class=" flex flex-col">
                            
                             <div class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                              <input class=" border border-gray-900 rounded-lg   focus:ring-primary-600 focus:border-primary-600 block  p-2.5 " type="checkbox" name='cek[]' value="desember" id="">
                             </div>
                            </div>
                            <div class=" flex flex-col">
                            
                              <input value="Desember" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="januari" name="desember[]" id="">
                            </div>
                            <div class=" flex flex-col">
                            
                              <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="date" name="desember[]" id="">
                            </div>
                            <div class=" flex flex-col">
                            
                              <input value="15000" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="number" name="desember[]" id="">
                            </div>
                          </div>
                          
                          
                          
                    
                      <button type="submit" class="text-white inline-flex items-center bg-blue-700 mt-5 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                          <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                          Simpan
                      </button>
                  </form>
              </div>
          </div>
      </div> 
      


     </div>
</div> 

   <div  class="relative  mt-5 overflow-x-auto shadow-md sm:rounded-lg ">
    <table id='umkm' class="w-full text-sm text-left rtl:text-right  text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-neutral-03 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  No
              </th>
              <th scope="col" class="px-6 py-3">
                  Sumber
              </th>
              <th scope="col" class="px-6 py-3">
                  Jan
              </th>
              <th scope="col" class="px-6 py-3">
                  Feb
              </th>
              <th scope="col" class="px-6 py-3">
                  Mar
              </th>
              <th scope="col" class="px-6 py-3">
                Apr
            </th>
            <th scope="col" class="px-6 py-3">
              Mei
          </th>
          <th scope="col" class="px-6 py-3">
           Jun
        </th>
        <th scope="col" class="px-6 py-3">
          Jul
          </th>
          <th scope="col" class="px-6 py-3">
        Ags
           </th>
          <th scope="col" class="px-6 py-3">
           Sep
                 </th>
           <th scope="col" class="px-6 py-3">
             Okt
           </th>
           <th scope="col" class="px-6 py-3">
             Nov
           </th>
           <th scope="col" class="px-6 py-3">
             Des
           </th>
                       <th scope="col" class="px-6 py-3">
                          Aksi
              </th>
          </tr>
      </thead>
      <tbody id="body">
          
              @foreach ($kas as $item)
                
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$loop->index +1 }}
                      </th>
                      <td class="px-6 py-4">
                         {{$item->kartuKeluarga->NKK}}
                      </td>
                     
                      <td scope="col" class="px-6 py-3">
                        
                        {{$item->Januari ? 'yes':'-'}}
                    </td>
                    <td scope="col" class="px-6 py-3">
                      {{$item->Februari ? 'yes':'-'}}
                    </td>
                    <td scope="col" class="px-6 py-3">
                      {{$item->Maret ? 'yes':'-'}}
                    </td>
                    <td scope="col" class="px-6 py-3">
                      {{$item->April ? 'yes':'-'}}
                  </td>
                  <td scope="col" class="px-6 py-3">
                    {{$item->Mei ? 'yes':'-'}}
                </td>
                <td scope="col" class="px-6 py-3">
                  {{$item->Juni ? 'yes':'-'}}
                        </td>
                        <td scope="col" class="px-6 py-3">
                          {{$item->Juli ? 'yes':'-'}}
                      </td>
                      <td scope="col" class="px-6 py-3">
                        {{$item->Agustus ? 'yes':'-'}}
                    </td>
                    <td scope="col" class="px-6 py-3">
                      {{$item->September ? 'yes':'-'}}
                    </td>
                    <td scope="col" class="px-6 py-3">
                      {{$item->Oktober ? 'yes':'-'}}
                    </td>
                    <td scope="col" class="px-6 py-3">
                      {{$item->November ? 'yes':'-'}}
                    </td>
                    <td scope="col" class="px-6 py-3">
                      {{$item->Desember ? 'yes':'-'}}
                    </td>
          <td class="flex">
            <div x-cloak x-data="{ open: false }">
              <button @click="open = true"  class="hover:border-none  before:absolute text-blue-main bg-dodger-blue-50 hover:bg-dodger-blue-100  px-8 py-2 text-base font-medium rounded-full  " type="button">
                  Detail
                </button>
                
                <!-- Main modal -->
                <div  x-show="open"  x-transition tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed  z-40 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                
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
                            <form class="p-4 md:p-5 text-left">
                              <div class="grid gap-4 mb-4 grid-cols-2">
                                  <div class="col-span-2">
                                      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NKK</label>
                                      <input type="text" name="name" id="name" value="{{$item->kartuKeluarga->NKK}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NKK" required="">
                                  </div>
                                 
                              </div>
    
                            
              
    
                            
                           
                                  {{-- <button onclick="openModal(id = {{$penduduk->penduduk_id}})" x-bind='SomeButton' class="hover:border-none  before:absolute text-blue-main bg-dodger-blue-50 hover:bg-dodger-blue-100  px-8 py-2 text-base font-medium rounded-full  " type="button">
                                      Edit
                                    </button> --}}
  
                                  
                            
                          </form>
                        </div>
                    </div>
                    <div class="bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40"></div> 
                </div> 
               
          </div>

            <form action="{{url('/kas/'.$item->id_kas)}}" onsubmit="return alert('are You sure ?')" method="post">
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
  


  </div>
    

 
@endsection

@push('js')

<script>
$(document).ready(function () {








  
      $('.tab').click(function(index){
                      console.log('halo');
                    $.ajax({
                        url: "http://127.0.0.1:8000/data/"+index.currentTarget.getAttribute('data'),
                        beforeSend: function() {
              $("#loading-image").show();
           },
                        
                    }).done(function (data) {
                        const parser = new DOMParser();
                        
                        const doc = parser.parseFromString(data, 'text/html');    
                        const table = doc.querySelector('#umkm');
                        $('#umkm').html(table);
                        $("#loading-image").hide();
                    })
                    
                    
                })
    })
  

var data1 = JSON.parse("{{ json_encode($data) }}");
data1.push(0);
var tgl = "{{ json_encode($tgl) }}"
tgl=tgl.replace(/&quot;/g,'"');


// start graph cart
const options = {
// set the labels option to true to show the labels on the X and Y axis
xaxis: {
  show: true,
  categories:JSON.parse(tgl),
  labels: {
    show: true,
    style: {
      fontFamily: "Inter, sans-serif",
      cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
    }
  },
  axisBorder: {
    show: false,
  },
  axisTicks: {
    show: false,
  },
},
yaxis: {
  show: true,
  labels: {
    show: true,
    style: {
      fontFamily: "Inter, sans-serif",
      cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
    },
    formatter: function (value) {
      return 'Rp.' + value;
    }
  }
},
series: [
  {
    name: "Pemasukan",
    data: data1,
    color: "#1A56DB",
  }
 
],
chart: {
  sparkline: {
    enabled: false
  },
  height: "100%",
  width: "100%",
  type: "area",
  fontFamily: "Inter, sans-serif",
  dropShadow: {
    enabled: false,
  },
  toolbar: {
    show: false,
  },
},
tooltip: {
  enabled: true,
  x: {
    show: false,
  },
},
fill: {
  type: "gradient",
  gradient: {
    opacityFrom: 0.55,
    opacityTo: 0,
    shade: "#1C64F2",
    gradientToColors: ["#1C64F2"],
  },
},
dataLabels: {
  enabled: false,
},
stroke: {
  width: 6,
},
legend: {
  show: false
},
grid: {
  show: true,
},
}
if (document.getElementById("labels-chart") && typeof ApexCharts !== 'undefined') {
const chart = new ApexCharts(document.getElementById("labels-chart"), options);
chart.render();
}


</script>

@endpush
