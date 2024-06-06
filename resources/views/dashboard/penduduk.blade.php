@extends('dashboard.template')

@section('content')


<h1 class="text-xl font-bold text-black my-2">Data Penduduk</h1>
<div class="text-sm px-5 overflow-x-auto py-5 font-medium text-center rounded-xl w-full bg-white  text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
       
       
    <ul x-data="{active: 'umkm'}" class="{{Auth::user()->user_id == '1'?'flex overflow-x-auto -mb-px':'hidden'}}">
        <li class="">
            <button   @click="active = 'umkm'"  :class="active=='umkm' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300':'tab inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"   data="rw" >Semua RT</button>
        </li>
        <li class="">
            <button @click="active = 'nikah'"   :class="active=='nikah' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300':'tab inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"  data="1" aria-current="page">RT 01</button>
        </li>
        <li class="">
            <button @click="active = 'tinggal'"  :class="active=='tinggal' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300':'tab inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"  data="2">RT 02</button>
        </l px-3i>
        <li class="">
            <button @click="active = 'meninggal'"    :class="active=='meninggal' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300':'tab inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"  data="3">RT 03</button>
        </li>
        <li class="">
            <button @click="active = 'baru'"  :class="active=='baru' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300':'tab inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"  data="4">RT 04</button>
        </li>
       

    </ul>

    <hr>
      
    <div class="flex flex-wrap md:flex-nowrap mt-3 w-full gap-3 lg:gap-0  justify-between items-center">
        
        
        
          
          <!-- Main modal -->
          <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden  overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
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
                                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NKK</label>
                                  <input type="text" name="NKK" id="name" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NKK" required="">
                              </div>
                              <div class="col-span-2 ">
                                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                                  <input type="text" name="NIK" id="price" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NIK" required="">
                              </div>
                              <div class="col-span-2 ">
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="text" name="nama" id="price" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Lengkap" required="">
                            </div>
                            <div class="col-span-2 ">
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <input type="text" name="alamat" id="price" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Lengkap" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="price" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="price" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                            </div>
                            <div class="col-span-2 ">
                                <label for="price" class="block text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="bordered-radio-1" type="radio" value="L" name="jenis_kelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki - laki</label>
                                </div>
                               
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="bordered-radio-1" type="radio" value="P" name="jenis_kelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
                                </div>
                               
                            </div>
                           
                              
                         
                              <div class="col-span-2 ">
                                  <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Golongan Darah</label>
                                  <select id="category" name="golongan_darah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                      <option value="A">A</option>
                                      <option value="B">B</option>
                                      <option value="AB">AB</option>
                                      <option value="O">O</option>
                                  </select>
                              </div>
                              
                              <div class="col-span-2 ">
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RT</label>
                                <select id="category"  name="rt" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                </select>
                            </div>
                            
                            <div class="col-span-2 ">
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                                <select id="category" name="agama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="hindu">Hindu</option>
                                   
                                    {{-- <option value="konghucu">Konghucu</option> --}}
                                </select>
                            </div>

                            
                            <div class="col-span-2 ">
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Perkawinan</label>
                                <select id="category" name="status_kawin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="kawin">Kawin</option>
                                    <option value="belum kawin" selected>Belum Kawin</option>
                                    <option value="cerai hidup" >Cerai Hidup</option>
                                    <option  value="cerai mati" >Cerai Mati</option>
                                    
                                    
                                </select>
                            </div>
                            <div class="col-span-2 ">
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                                <input type="text" name="pekerjaan" id="price" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Pekerjaan" required="">
                            </div>

                            <div class="col-span-2 ">
                                <label for="price" class="block text-sm font-medium text-gray-900 dark:text-white">Status Tinggal</label>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="bordered-radio-1" type="radio" value="tetap" name="status_tinggal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tetap</label>
                                </div>
                               
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="bordered-radio-1" type="radio" value="kontrak" name="status_tinggal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kontrak</label>
                                </div>
                               
                            </div>
                            <div class="col-span-2 ">
                                <label for="price" class="block text-sm font-medium text-gray-900 dark:text-white">Status Meninggal</label>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="bordered-radio-1" type="radio" value="0" name="status_meninggal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:te xt-gray-300">Hidup</label>
                                </div>
                               
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input id="bordered-radio-1" type="radio" value="1" name="status_meninggal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Meninggal</label>
                                </div>
                               
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
          
    
        <div class="filter flex space-x-2  w-full h-full items-center ">
           
            <div class="relative w-full md:w-1/2 h-full">
                <div class="absolute  inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input name="search"  id="search" data="umkm" value="{{ request('search') }}" class="search pl-8 py-3 block w-full  p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari" required />
            </div>

            <div  x-data="{open:false}" class="relative h-full" x-cloak >
                <button @click="open= !open" class=" px-3 hover:bg-blue-main hover:border-blue-main hover:text-white items-center  w-fit  md:min-w-fit md:w-full h-full py-3  border border-gray-300 rounded-full" ><div class="flex min-w-fit lg:min-w-[100px] justify-around items-center h-full"><i class="h-full fa-solid fa-sliders"></i> <p class="hidden lg:block" id="sort">-semua-</p> <i class="hidden lg:block fa fa-chevron-down"></i></div></button>
                <div class="absolute  left-1/2 -translate-x-1/2 w-min z-30 bg-white drop-shadow-card" x-show="open"  @click.outside="open=false" >
                   <ul>
                    <li><button @click="open= !open"  data="semua" value="Semua" class="sort hover:bg-blue-main hover:text-white py-2 w-[200px]" >Semua</button></li>
                    <li><button @click="open= !open"  data="L" value="Laki-laki" class="sort hover:bg-blue-main hover:text-white py-2 w-[200px]" >laki-laki</button></li>
                    <li><button @click="open= !open"  data='P' value="Perempuan" class="sort hover:bg-blue-main hover:text-white py-2 w-[200px]">Perempuan</button></li>
                    
                    
                   </ul>
                </div>
            </div>
          
        </div>
        <div class="flex w-full space-x-1">
            <a href="{{url('penduduk/pdf')}}" type="button"   class="flex border w-full md:w-1/2 px-3 py-3  h-full  rounded-full justify-center space-x-2 items-center hover:text-white hover:bg-blue-main hover:border-blue-main "> 
                 <i class="fa-solid  fa-up-right-from-square"></i>
                      
                <p class="hidden sm:block md:hidden lg:block">Export CSV</p>
        </a>
            <div x-cloak x-data="{ open: false }" class="w-full md:w-1/2">
                
                <button @click="open= ! open" type="submit"   class="flex border w-full  px-3 py-3  h-full  rounded-full justify-center space-x-2 items-center hover:text-white hover:bg-blue-main hover:border-blue-main ">
    
                    <i class="fa-solid fa-file"></i>
                      
                    <p class="hidden  sm:block md:hidden lg:block">Import CSV</p>
                  </button>
               <!-- Main modal -->
               <div x-cloak x-show="open"   tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed  z-40 justify-center items-center w-full inset-0 h-[calc(100%-1rem)] max-h-full">
                              
                <div x-cloak  class="absolute w-full max-w-[920px] h-[80vh] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2  p-4  z-50 ">
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
                           
                            <button  class="text-neutral-01 bg-blue-main hover:bg-dodger-blue-800 h-full mt-3  px-8 py-2 text-base font-medium rounded-full  " type="submit">
                                Tambah
                              </button>
                        </form>
                      </div>
                  </div>
                  <div class="bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40"></div> 
              </div> 
                
            </div>
           
         
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-neutral-01 w-full md:w-1/3 bg-blue-main hover:bg-dodger-blue-800    py-2 text-base font-medium rounded-full  " type="button">
                <p class="hidden  sm:block md:hidden lg:block">Tambah</p><p class="block  sm:hidden md:block lg:hidden">+</p>
              </button>
             
    
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
                        NIK
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Lahir
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jenis Kelamin
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Agama
                    </th>
                    <th scope="col" class="px-6 py-3">
                       Aksi
                    </th>
                </tr>
            </thead>
            <tbody id="body">
                
                    @foreach ($data as $penduduk)
                 <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $loop->index +1 }}
                    </th>
                    <td class="px-6 py-4">
                        {{$penduduk->NIK}}
                    </td>
                    <td class="px-6 py-4">
                        {{$penduduk->nama_penduduk}}
                    </td>
                    <td class="px-6 py-4">
                        {{$penduduk->tanggal_lahir}}
                    </td>
                    <td class="px-6 py-4">
                        {{$penduduk->jenis_kelamin}}
                    </td>
                    <td class="px-6 py-4">
                        {{$penduduk->agama}}
                    </td>
                
                    <td class="px-6 py-4 flex gap-2 ">
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
                                                    <input readonly type="text" name="name" id="name" value="{{$penduduk->kartuKeluarga->NKK}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NKK" required="">
                                                </div>
                                                <div class="col-span-2 ">
                                                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                                                    <input readonly type="text" name="price" id="price" value="{{$penduduk->NIK}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NIK" required="">
                                                </div>
                                                <div class="col-span-2 ">
                                                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                                  <input readonly type="text" name="price" id="price" value="{{$penduduk->nama_penduduk}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Lengkap" required="">
                                              </div>
                                              <div class="col-span-2 sm:col-span-1">
                                                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                                                  <input readonly type="text" name="price" id="price" value={{$penduduk->tempat_lahir}} class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                                              </div>
                                              <div class="col-span-2 sm:col-span-1">
                                                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                                                  <input readonly type="date" name="price" id="price" value="{{$penduduk->tanggal_lahir}}"  class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                                              </div>
                                              <div class="col-span-2 sm:col-span-1 ">
                                                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                                                  <input readonly type="text" name="price" id="price" value={{$penduduk->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'}} class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                                              </div>
                                            
                                                
                                           
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Golongan Darah</label>
                                                    <input readonly type="text" name="price" id="price" value={{$penduduk->golongan_darah}} class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                                                </div>
                                                
                                                <div class="col-span-2 ">
                                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                                    <input readonly type="text" name="price" id="price" value="{{$penduduk->alamat}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                                                </div>
                                                
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RT</label>
                                                    <input readonly type="text" name="price" id="price" value={{$penduduk->kartuKeluarga->rt->nomor_rt}} class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                                                </div>

                                              
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                                                    <input readonly type="text" name="price" id="price" value={{$penduduk->agama}} class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                                                </div>
                                              
                                         
                                         <div class="col-span-2 sm:col-span-1">
                                             <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Perkawinan</label>
                                             <input readonly type="text" name="price" id="price" value="{{$penduduk->status_perkawinan}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                                         </div>
    
                                              <div class="col-span-2 sm:col-span-1 ">
                                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                                                <input readonly type="text" name="price" id="price" value="{{$penduduk->pekerjaan}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Lengkap" required="">
                                            </div>
                  
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Tinggal</label>
                                                <input readonly type="text" name="price" id="price" value={{$penduduk->status_tinggal}} class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                                            </div>
                                            
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Hidup</label>
                                                <input readonly type="text" name="price" id="price" value={{$penduduk->status_kematian == "0" ? 'Hidup' : 'Meninggal'}} class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                                            </div>
                                             
                                            </div>
                  
                                          
                            
                  
                                          
                                         
                                                <button onclick="openModal(id = {{$penduduk->penduduk_id}})" x-bind='SomeButton' class="hover:border-none  before:absolute text-blue-main bg-dodger-blue-50 hover:bg-dodger-blue-100  px-8 py-2 text-base font-medium rounded-full  " type="button">
                                                    Edit
                                                  </button>
                
                                                
                                          
                                        </form>
                                      </div>
                                  </div>
                                  <div class="bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40"></div> 
                              </div> 
                             
                        </div>
                        <form action="{{url('/penduduk/'.$penduduk->penduduk_id)}}" onsubmit="return alert('are You sure ?')" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="hover:border-none  hover:bg-dodger-blue-100  px-8 py-2 text-base font-medium rounded-full  "><svg   xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path  stroke="#EE0B0B" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 5.98c-3.33-.33-6.68-.5-10.02-.5-1.98 0-3.96.1-5.94.3L3 5.98m5.5-1.01.22-1.31C8.88 2.71 9 2 10.69 2h2.62c1.69 0 1.82.75 1.97 1.67l.22 1.3m3.35 4.17-.65 10.07C18.09 20.78 18 22 15.21 22H8.79C6 22 5.91 20.78 5.8 19.21L5.15 9.14m5.18 7.36h3.33m-4.16-4h5"/>
                              </svg>
                            </button>
                        </form>
                        
                    </td>
                 <td>
                    <div id="modal-{{$penduduk->penduduk_id}}"  class="hidden" >

      
                        <!-- Main modal -->
                        <div      tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed  z-40 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        
                          <div  class="absolute w-[920px] h-[80vh] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2  p-4  z-50 ">
                                <!-- Modal content -->
                                <div  class="relative bg-white w-full  rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                          Detail
                                        </h3>
                                        <button type="button" onclick="closeModal(id = {{$penduduk->penduduk_id}})" class="absolute -top-5 -right-4 bg-blue-main   text-white border-2 border-white hover:bg-gray-200 hover:text-gray-900 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " >
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form  action="{{url('/penduduk/'.$penduduk->penduduk_id)}}" method="POST" class="p-4 md:p-5 text-left">
                                        @csrf
                                        @method('PUT')
                                      <div class="grid gap-4 mb-4 grid-cols-2">
                                          <div class="col-span-2">
                                              <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NKK</label>
                                              <input type="text" name="NKK" id="name" value="{{$penduduk->kartuKeluarga->NKK}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NKK" required="">
                                          </div>
                                          <div class="col-span-2 ">
                                              <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                                              <input type="text" name="NIK" id="price" value="{{$penduduk->NIK}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NIK" required="">
                                          </div>
                                          <div class="col-span-2 ">
                                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                            <input type="text" name="nama" id="price" value="{{$penduduk->nama_penduduk}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Lengkap" required="">
                                        </div>
                                        <div class="col-span-2 ">
                                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                            <input type="text" name="alamat" id="price" value="{{$penduduk->alamat}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Lengkap" required="">
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" id="price" value={{$penduduk->tempat_lahir}} class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                                            <input type="date" name="tanggal_lahir" id="price" value="{{$penduduk->tanggal_lahir}}"  class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                                        </div>
                                        <div class="col-span-2 ">
                                            <label for="price" class="block text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                                <input id="bordered-radio-1" {{$penduduk->jenis_kelamin=='L'? 'checked':''}} type="radio" value="L" name="jenis_kelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki - laki</label>
                                            </div>
                                           
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                                <input id="bordered-radio-1" {{$penduduk->jenis_kelamin=='P'? 'checked':''}} type="radio" value="P" name="jenis_kelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
                                            </div>
                                           
                                        </div>
                                       
                                          
                                     
                                          <div class="col-span-2 ">
                                              <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Golongan Darah</label>
                                              <select id="category" name="golongan_darah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                  <option {{$penduduk->golongan_darah=="a"?'selected':''}} value="a">A</option>
                                                  <option {{$penduduk->golongan_darah=="b"?'selected':''}}  value="b">B</option>
                                                  <option {{$penduduk->golongan_darah=="ab"?'selected':''}} value="ab">AB</option>
                                                  <option {{$penduduk->golongan_darah=="o"?'selected':''}} value="o">O</option>
                                              </select>
                                          </div>
                                          
                                          <div class="col-span-2 ">
                                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RT</label>
                                            <select id="category" name="rt" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option {{$penduduk->kartuKeluarga->rt->nomor_rt=='1'?'selected':''}} value="1">01</option>
                                                <option {{$penduduk->kartuKeluarga->rt->nomor_rt=='2'?'selected':''}} value="2">02</option>
                                                <option {{$penduduk->kartuKeluarga->rt->nomor_rt=='3'?'selected':''}} value="3">03</option>
                                                <option {{$penduduk->kartuKeluarga->rt->nomor_rt=='4'?'selected':''}} value="4">04</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-span-2 ">
                                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                                            <select id="category" name="agama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option {{$penduduk->agama=='islam'?'selected':''}} value="islam">Islam</option>
                                                <option {{$penduduk->agama=='kristen'?'selected':''}} value="kristen">Kristen</option>
                                                <option {{$penduduk->agama=='katolik'?'selected':''}}  value="katolik">Katolik</option>
                                                <option {{$penduduk->agama=='hindu'?'selected':''}} value="hindu">Hindu</option>
                                               
                                                <option {{$penduduk->agama=='budha'?'selected':''}} value="budha">Budha</option>
                                            </select>
                                        </div>
                    
                                        <div class="col-span-2 ">
                                          <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                                          <input type="text" name="pekerjaan" id="price" value="{{$penduduk->pekerjaan}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Lengkap" required="">
                                      </div>
                    
                                        
                                        <div class="col-span-2 ">
                                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Perkawinan</label>
                                            <select id="category" name="status_kawin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option {{$penduduk->status_perkawinan == 'kawin' ? 'selected':''}} value="kawin">Kawin</option>
                                                <option {{$penduduk->status_perkawinan == 'belum kawin' ? 'selected':''}} value="belum kawin" >Belum Kawin</option>
                                                <option {{$penduduk->status_perkawinan == 'cerai hidup' ? 'selected':''}} value="cerai hidup" >Cerai Hidup</option>
                                                <option {{$penduduk->status_perkawinan == 'cerai mati' ? 'selected':''}} value="cerai mati" >Cerai Mati</option>
                                                
                                            </select>
                                        </div>
                                        
                    
                                        <div class="col-span-2 ">
                                            <label for="price" class="block text-sm font-medium text-gray-900 dark:text-white">Status Tinggal</label>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                                <input id="bordered-radio-1" {{$penduduk->status_tinggal == 'tetap' ? 'checked':''}}  type="radio" value="tetap" name="status_tinggal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                               
                                                <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tetap</label>
                                            </div>
                                           
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                                <input id="bordered-radio-1" {{$penduduk->status_tinggal == 'kontrak' ? 'checked':''}} type="radio" value="kontak" name="status_tinggal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="bordered-radio-1"  class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kontrak</label>
                                            </div>
                                           
                                        </div>
                                        <div class="col-span-2 ">
                                            <label for="price" class="block text-sm font-medium text-gray-900 dark:text-white">Status Meninggal</label>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                                <input id="bordered-radio-1" {{$penduduk->status_kematian == '0' ? 'checked':''}} type="radio" value="0" name="status_meninggal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:te xt-gray-300">Hidup</label>
                                            </div>
                                           
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                                <input id="bordered-radio-1" {{$penduduk->status_kematian == '1' ? 'checked':''}} type="radio" value="1" name="status_meninggal" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Meninggal</label>
                                            </div>
                                           
                                        </div>
                    
                                          
                                      </div>
                                   
                                          <button class="hover:border-none  before:absolute text-blue-main bg-dodger-blue-50 hover:bg-dodger-blue-100  px-8 py-2 text-base font-medium rounded-full  " type="submit">
                                              simpan
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
    
    <nav aria-label="page navigation example" class="page mt-5 text-right" >
        <ul class="inline-flex -space-x-px text-sm">
          <li>
            <button {{$data->previousPageUrl()?'':'disabled'}} onclick="page(event,'{{$data->previousPageUrl()}}','umkm','page')" class="pagination disabled:bg-neutral-04  flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><i class="fa-solid fa-chevron-left"></i></button>
          </li>
          <li>
            <a href="#" class=" flex items-center justify-center px-3 h-8 bg-blue-main leading-tight  text-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{$data->currentPage()}}</a>
          </li>
         
          <li>
            <button  {{$data->nextPageUrl()?'':'disabled'}}  onclick="page(event,'{{$data->nextPageUrl()}}','umkm','page')" class="pagination disabled:bg-neutral-04  flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><i class="fa-solid fa-chevron-right"></i></button>
          </li>
        </ul>
      </nav>
      
</div>
    

</div> 


   
</div>


{{-- kartu Keluarga --}}
<h1 class="text-xl font-bold text-black my-2">Data Kartu Keluarga</h1>
<div class="text-sm px-5 overflow-x-auto py-5 font-medium text-center rounded-xl w-full bg-white  text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
       
       
  
  
      
    <div class="flex flex-wrap md:flex-nowrap gap-3 mt-3 w-full justify-between items-center">
        
        
        
          
          <!-- Main modal -->
          <div  id="crud-modal-1" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
              <div  class="relative p-4  w-[900px] h-[80vh]">
                  <!-- Modal content -->
                  <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                      <!-- Modal header -->
                      <div class="flex items-center  justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                              Create New Product
                          </h3>
                          <button type="button" class="absolute -top-5 -right-4 bg-blue-main   text-white border-2 border-white hover:bg-gray-200 hover:text-gray-900 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-toggle="crud-modal-1">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                      </div>
                      <!-- Modal body -->
                      <form action="{{url('/penduduk/kepalaKeluarga')}}" method="POST" class="p-4 md:p-5 text-left">
                        @csrf
                        @method('POST')
                          <div class="grid gap-4 mb-4 grid-cols-2">
                              <div class="col-span-2">
                                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NKK</label>
                                  <input type="text" name="NKK" id="name" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NKK" required="">
                              </div>
                              <div class="col-span-2 ">
                                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                                  <input type="text" name="NIK" id="price" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NIK" required="">
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
          
    {{-- Kepala Keluarga  --}}

    <div class="filter flex space-x-2  w-full h-full items-center ">
           
        <div class="relative w-full md:w-1/2 h-full">
            <div class="absolute  inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input name="search"  id="search" data="umkm1" value="{{ request('search') }}" class="search pl-8 py-3 block w-full  p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari" required />
        </div>
{{-- 
        <div  x-data="{open:false}" class="relative h-full" x-cloak >
            <button @click="open= !open" class=" px-3 hover:bg-blue-main hover:border-blue-main hover:text-white items-center  w-fit  md:min-w-fit md:w-full h-full py-3  border border-gray-300 rounded-full" ><div class="flex min-w-fit lg:min-w-[100px] justify-around items-center h-full"><i class="h-full fa-solid fa-sliders"></i> <p class="hidden lg:block" id="sort">-semua-</p> <i class="hidden lg:block fa fa-chevron-down"></i></div></button>
            <div class="absolute  left-1/2 -translate-x-1/2 w-min z-30 bg-white drop-shadow-card" x-show="open"  @click.outside="open=false" >
               <ul>
                <li><button @click="open= !open"  data="semua" value="Semua" class="sort hover:bg-blue-main hover:text-white py-2 w-[200px]" >Semua</button></li>
                <li><button @click="open= !open"  data="L" value="Laki-laki" class="sort hover:bg-blue-main hover:text-white py-2 w-[200px]" >laki-laki</button></li>
                <li><button @click="open= !open"  data='P' value="Perempuan" class="sort hover:bg-blue-main hover:text-white py-2 w-[200px]">Perempuan</button></li>
                
                
               </ul>
            </div>
        </div> --}}
      
    </div>

    </div>        
    <div class="relative mt-5 overflow-x-auto shadow-md sm:rounded-lg ">
    
        <table id='umkm1' class="w-full text-sm text-left rtl:text-right  text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-neutral-03 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        RT
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No Telepon
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Kepala Keluarga
                   
                    <th scope="col" class="px-6 py-3">
                       Aksi
                    </th>
                </tr>
            </thead>
            <tbody id="body">
                
                    @foreach ($kartuKeluarga as $penduduk)
                 <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $loop->index +1}}
                    </th>
                    <td class="px-6 py-4">
                        {{$penduduk->kartuKeluarga->rt_id}}
                    </td>
                    <td class="px-6 py-4">
                        {{$penduduk->kartuKeluarga->no_telepon}}
                    </td>
                    <td class="px-6 py-4">
                        {{$penduduk->penduduk->nama_penduduk}}
                  
                
                    <td class="px-6 py-4 flex gap-2 ">
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
                                                <input readonly type="text" name="NKK" id="name" value="{{$penduduk->kartuKeluarga->NKK}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NKK" required="">
                                            </div>
                                            <div class="col-span-2">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kepala Keluarga</label>
                                                <input readonly type="text" name="NKK" id="name" value="{{$penduduk->penduduk->nama_penduduk}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NKK" required="">
                                            </div>
                                            <div class="col-span-2">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomer Telepon</label>
                                                <input readonly type="text" name="NKK" id="name" value="{{$penduduk->kartuKeluarga->no_telepon}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NKK" required="">
                                            </div>
                                            <div class="col-span-2">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Perkawinan</label>
                                                <input readonly type="text" name="NKK" id="name" value="{{$penduduk->penduduk->pekerjaan}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NKK" required="">
                                            </div>
                                            <div class="col-span-2">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Perkawinan</label>
                                                <input readonly type="text" name="NKK" id="name" value="{{$penduduk->penduduk->status_perkawinan}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NKK" required="">
                                            </div>
                                            <div class="col-span-2">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Tinggal</label>
                                                <input readonly type="text" name="NKK" id="name" value="{{$penduduk->penduduk->status_tinggal}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NKK" required="">
                                            </div>
                                            <div class="col-span-2">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Kematian</label>
                                                <input readonly type="text" name="NKK" id="name" value="{{$penduduk->penduduk->status_kematian  ? 'Mati':'Hidup'}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NKK" required="">
                                            </div>
                                            
                                        </div>
                                        </form>
                                      </div>
                                  </div>
                                  <div class="bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40"></div> 
                              </div> 
                             
                        </div>
                        <form action="{{url('/penduduk/kepalaKeluarga/'.$penduduk->id_kepala_keluarga)}}" onsubmit="return alert('are You sure ?')" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="hover:border-none  hover:bg-dodger-blue-100  px-8 py-2 text-base font-medium rounded-full  "><svg   xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path  stroke="#EE0B0B" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 5.98c-3.33-.33-6.68-.5-10.02-.5-1.98 0-3.96.1-5.94.3L3 5.98m5.5-1.01.22-1.31C8.88 2.71 9 2 10.69 2h2.62c1.69 0 1.82.75 1.97 1.67l.22 1.3m3.35 4.17-.65 10.07C18.09 20.78 18 22 15.21 22H8.79C6 22 5.91 20.78 5.8 19.21L5.15 9.14m5.18 7.36h3.33m-4.16-4h5"/>
                              </svg>
                            </button>
                        </form>
                        
                    </td>
                 <td>
                 
                </td>   
                </tr>
                
                
                    @endforeach
                  
             
               
            </tbody>
        </table>
    </div>
    
    <nav aria-label="page1 navigation example" class="page1 mt-5 text-right" >
        <ul class="inline-flex -space-x-px text-sm">
          <li>
            <button {{$kartuKeluarga->previousPageUrl()?'':'disabled'}} onclick="page(event,'{{$kartuKeluarga->previousPageUrl()}}','umkm1','page1')" class="pagination disabled:bg-neutral-04  flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><i class="fa-solid fa-chevron-left"></i></button>
          </li>
          <li>
            <a href="#" class=" flex items-center justify-center px-3 h-8 bg-blue-main leading-tight  text-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{$kartuKeluarga->currentPage()}}</a>
          </li>
         
          <li>
            <button  {{$kartuKeluarga->nextPageUrl()?'':'disabled'}}  onclick="page(event,'{{$kartuKeluarga->nextPageUrl()}}','umkm1','page1')" class="pagination disabled:bg-neutral-04  flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><i class="fa-solid fa-chevron-right"></i></button>
          </li>
        </ul>
      </nav>
      
</div>
    

</div> 


   
</div>
    
    

@endsection

@push('js')

<script>


const openModal = (id) => {
    document.getElementById('modal-'+id).classList.remove('hidden');
}

const closeModal = (id) => {
    document.getElementById('modal-'+id).classList.add('hidden');
}

function page(event,link,target,pagination) {
               console.log(link);
               event.preventDefault()
               $.ajax({
                               url: link,
                               beforeSend: function() {
                     $("#loading-image").show();
                  },
                  success:function(data){
                    
                   const parser = new DOMParser();
                               const doc = parser.parseFromString(data, 'text/html');    
                               const table = doc.getElementById(target);
                      
                               const page =doc.querySelector('.'+pagination);
                           
                                  $('#'+target).html(table);
                                  $('.'+pagination).html(page);
                               $("#loading-image").hide();
                  }
                               
                           })
              } 


document.addEventListener('alpine:init', () => {
        Alpine.bind('SomeButton', () => ({
            type: 'button',
 
            '@click'() {
                this.open=false
         
            },
 
            ':disabled'() {
                return this.shouldDisable
            },
        }))
    })


    $('.sort').click(function (index) {
        
          
            let    data = index.currentTarget.getAttribute('data')
            

      

                   $.ajax({
                       url: "{{url('penduduk/sort/')}}"+'/'+data,
                       method:"GET",
                       beforeSend: function() {
              $("#loading-image").show();
           },
                       success: function (data) {
                        $("#loading-image").hide();
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(data, 'text/html');    
                        const table = doc.getElementById('umkm');

                        
                           $('#umkm').html(table);
                           $('#sort').html( index.currentTarget.getAttribute('value'));
                       }
                       
                   })
               })

$(document).ready(function(){


    $('.tab').click(function(index){
        console.log(this.getAttribute('data'));

        $.ajax({
            url:"{{url('penduduk/rt/')}}"+'/'+this.getAttribute('data'),
            method:'GET',
            dataType : 'html',
            beforeSend:function() {
              $("#loading-image").show();
           },
           success:function(data){
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');    
            const table = doc.getElementById('umkm');
            const table1 = doc.getElementById('umkm1');
            const page = doc.querySelector('.page');
            const page1 = doc.querySelector('.page1');
                        
            $('#umkm').html(table)   
            $('.page').html(page)   
            $('.page1').html(page1)   
            $('#umkm1').html(table1)   
        
            $("#loading-image").hide();
           },
           error:function(data){
            $("#loading-image").hide();
           }
        })
    })
    
    

    $('.search').change(function (index) {
            console.log(index.currentTarget.getAttribute('data'));
                    let data = ($(this).val())
                    if(data == null || data == ""){
                        data='kosong';
                    }
                    
                    
                  
                    $.ajax({
                        url: "{{url('search/penduduk/type/')}}"+'/'+index.currentTarget.getAttribute('data')+'/'+data,
                        method:'GET',beforeSend: function() {
              $("#loading-image").show();
           },
                        
                    }).done(function (data) {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(data, 'text/html');  
                      
                        const table = doc.getElementById(index.currentTarget.getAttribute('data'));
                        
                        $('#'+index.currentTarget.getAttribute('data')).html(table)   
                        $("#loading-image").hide();
                    })

                })
})
                
</script>

@endpush
