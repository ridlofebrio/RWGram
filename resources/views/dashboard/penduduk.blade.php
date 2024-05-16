@extends('dashboard.template')

@section('content')



<div class="text-sm px-5 overflow-x-auto py-5 font-medium text-center rounded-xl w-full bg-white  text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
       
       
    <ul x-data="{active: 'umkm'}" class="flex overflow-x-auto -mb-px">
        <li class="">
            <button   @click="active = 'umkm'"  :class="active=='umkm' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300':'tab inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"   data="umkm" >Semua RT</button>
        </li>
        <li class="">
            <button @click="active = 'nikah'"  data="nikah"  :class="active=='nikah' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300':'tab inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"  data="umkm" aria-current="page">RT 01</button>
        </li>
        <li class="">
            <button @click="active = 'tinggal'"  data="tinggal" :class="active=='tinggal' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300':'tab inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"  data="umkm">RT 02</button>
        </l px-3i>
        <li class="">
            <button @click="active = 'meninggal'"  data="meninggal"  :class="active=='meninggal' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300':'tab inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"  data="umkm">RT 03</button>
        </li>
        <li class="">
            <button @click="active = 'baru'"  data="meninggal"  :class="active=='baru' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300':'tab inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"  data="umkm">RT 04</button>
        </li>
       

    </ul>

    <hr>
      
    <div class="flex mt-3 w-full justify-between items-center">
        
        
        
          
          <!-- Main modal -->
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
    
        <div class="filter flex space-x-2 items-center">
           
            <div  x-data="{open:false}" class="relative" x-cloak >
                <button @click="open= !open" class="flex px-3 items-center space-x-5 py-2 border-2 border-neutral-400 rounded-full" ><i class="fa-solid fa-sliders"></i> <p>-semua-</p> <i class="fa fa-chevron-down"></i></button>
                <div class="absolute left-1/2 -translate-x-1/2  px-3 py-3 z-30 bg-white drop-shadow-card" x-show="open" @click.outside="open=false" >
                   <ul>
                    <li><button data="semua" class="sort" >Semua</button></li>
                    <li><button data="L" class="sort" >laki-laki</button></li>
                    <li><button data='P' class="sort" >Perempuan</button></li>
                    
                    
                   </ul>
                </div>
            </div>
          
            <div class="search border-2 bg-neutral-04 rounded-full px-3">
                <i class="fa-solid fa-magnifying-glass"></i>

                <input id="search" type="text" class="border-none bg-transparent" placeholder="cari apapun">  
            </div>
        </div>
       <div class="flex space-x-1">
        <button x-cloak   class="flex border-2 px-8 py-2  rounded-full justify-between space-x-2 items-center hover:bg-blue-main hover:border-blue-main ">

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path fill="#1B1B1B" d="M13 11.748c-.19 0-.38-.07-.53-.22a.754.754 0 0 1 0-1.06l8.2-8.2c.29-.29.77-.29 1.06 0 .29.29.29.77 0 1.06l-8.2 8.2c-.15.15-.34.22-.53.22Z"/>
                <path fill="#1B1B1B" d="M22 7.55c-.41 0-.75-.34-.75-.75V2.75H17.2c-.41 0-.75-.34-.75-.75s.34-.75.75-.75H22c.41 0 .75.34.75.75v4.8c0 .41-.34.75-.75.75Zm-7 15.2H9c-5.43 0-7.75-2.32-7.75-7.75V9c0-5.43 2.32-7.75 7.75-7.75h2c.41 0 .75.34.75.75s-.34.75-.75.75H9C4.39 2.75 2.75 4.39 2.75 9v6c0 4.61 1.64 6.25 6.25 6.25h6c4.61 0 6.25-1.64 6.25-6.25v-2c0-.41.34-.75.75-.75s.75.34.75.75v2c0 5.43-2.32 7.75-7.75 7.75Z"/>
              </svg>
            <p class="text-black font-semibold">Import CSV</p>
          </button>
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-neutral-01 bg-blue-main hover:bg-dodger-blue-800   px-8 py-2 text-base font-medium rounded-full  " type="button">
            Tambah
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
                        {{$penduduk->penduduk_id}}
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
                                                    <input type="text" name="name" id="name" value="{{$penduduk->kartuKeluarga->NKK}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NKK" required="">
                                                </div>
                                                <div class="col-span-2 ">
                                                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                                                    <input type="text" name="price" id="price" value="{{$penduduk->NIK}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NIK" required="">
                                                </div>
                                                <div class="col-span-2 ">
                                                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                                  <input type="text" name="price" id="price" value="{{$penduduk->nama_penduduk}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Lengkap" required="">
                                              </div>
                                              <div class="col-span-2 sm:col-span-1">
                                                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                                                  <input type="text" name="price" id="price" value={{$penduduk->tempat_lahir}} class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                                              </div>
                                              <div class="col-span-2 sm:col-span-1">
                                                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                                                  <input type="date" name="price" id="price" value="{{$penduduk->tanggal_lahir}}"  class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                                              </div>
                                              <div class="col-span-2 sm:col-span-1 ">
                                                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                                                  <input type="text" name="price" id="price" value={{$penduduk->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'}} class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                                              </div>
                                            
                                                
                                           
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Golongan Darah</label>
                                                    <input type="text" name="price" id="price" value={{$penduduk->golongan_darah}} class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                                                </div>
                                                
                                                <div class="col-span-2 ">
                                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                                    <input type="text" name="price" id="price" value="{{$penduduk->alamat}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                                                </div>
                                                
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RT</label>
                                                    <input type="text" name="price" id="price" value={{$penduduk->kartuKeluarga->rt->nomor_rt}} class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                                                </div>

                                              
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                                                    <input type="text" name="price" id="price" value={{$penduduk->agama}} class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                                                </div>
                                              
                                         
                                         <div class="col-span-2 sm:col-span-1">
                                             <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Perkawinan</label>
                                             <input type="text" name="price" id="price" value="{{$penduduk->status_perkawinan}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                                         </div>
    
                                              <div class="col-span-2 sm:col-span-1 ">
                                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                                                <input type="text" name="price" id="price" value="{{$penduduk->pekerjaan}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Lengkap" required="">
                                            </div>
                  
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Tinggal</label>
                                                <input type="text" name="price" id="price" value={{$penduduk->status_tinggal}} class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
                                            </div>
                                            
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Hidup</label>
                                                <input type="text" name="price" id="price" value={{$penduduk->status_kematian == "0" ? 'Hidup' : 'Meninggal'}} class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir" required="">
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
    

</div>
    

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
    

    {{-- <div x-data="{ open: false }" @open-me.window="open=true">
        <div @click="$dispatch('open-me')">Open Me</div>
        <div x-show="open">I've been opened</div>
    </div> --}}
 
@endsection

@push('js')

<script>


const openModal = (id) => {
    document.getElementById('modal-'+id).classList.remove('hidden');
}

const closeModal = (id) => {
    document.getElementById('modal-'+id).classList.add('hidden');
}

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
                       url: "http://127.0.0.1:8000/penduduk/sort/"+data,
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
                       }
                       
                   })
               })

    $('#search').change(function () {
                    let data = ($(this).val())
                    if(data == null || data == ""){
                        data='kosong';
                    }
                    console.log(data);
                    
                  
                    $.ajax({
                        url: "http://127.0.0.1:8000/search/penduduk/"+data,
                        async:true,
                        
                    }).done(function (data) {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(data, 'text/html');    
                        const table = doc.getElementById('umkm');
                        
                        $('#umkm').html(table)   
                    })

                })
                
</script>

@endpush
