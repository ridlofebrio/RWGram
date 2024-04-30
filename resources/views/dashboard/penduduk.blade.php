@extends('dashboard.template')

@section('content')

<button class="border p-2" onclick="document.body.classList.toggle('dark-mode')"> 
    Switch theme 
</button> 
<div class="text-sm px-5 overflow-x-auto py-5 font-medium text-center rounded-xl w-full bg-white  text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
       
      
    <div class="flex mt-3 w-full justify-between items-center">
        
        
        <div x-data="{open:false}" >
            <button @click="open= !open"   class="text-neutral-01 bg-blue-main hover:bg-dodger-blue-800    px-5 py-2 text-base font-medium rounded-full drop-shadow-button ">Tambah Penduduk +</button>
                <div  x-show="open" @click.outside="open = false" class="absolute transition-all  pb-10 h-[750px] bg-white rounded-xl drop-shadow-card w-[650px] top-1/2 left-1/2 z-30 -translate-x-1/2 -translate-y-1/2">
                    <h1 class="font-body text-3xl text-black ">ini modal</h1>
                    <button @click="open = false" class="bg-blue-main  w-10 h-10 hover:bg-red-500  absolute border-2 border-white -top-5 -right-5  text-white rounded-full" >x</button>
                  <div class="flex flex-wrap w-full p-3 justify-center overflow-y-auto overflow-x-hidden h-full items-center text-left">
                    <form action="/penduduk" method="POST" class="flex font-body text-black  flex-col gap-5">
                        @csrf
                        @method('POST')
                        <div class="flex flex-wrap gap-3">
                            <div class="flex flex-col gap-1 ">
                                <label for="nama"  >Nama</label>
                                <input type="text" name="nama" id="">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="rt">RT</label>
                                <input type="number" name="rt" id="">
                            </div>
                        </div>
                     
                        <div class="flex flex-col gap-1">
                            <label for="nkk">NKK</label>
                            <input type="text" name="nkk" id="">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" id="">
                        </div>
                     
                        <div class="flex flex-col gap-1">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" id="">
                        </div>
                    
                        <div class="flex gap-3 w-full justify-between">
                            <div class="flex w-1/2 flex-col gap-1">
                                <label for="tanggal_lahir">tanggal lahir </label>
                                <input type="date" name="tanggal_lahir" id="">
                            </div>
                           
                        <div class="flex flex-col gap-1 w-1/2">
                            <label for="perkawinan">status perkawinan </label>
                            <select name="perkawinan" id="">
                                <option value="kawin">Kawin </option>  
                                <option value="belum kawin">Belum Kawin</option>  
                                <option value="cerai">Cerai</option>  
                    
                            </select>
                        </div>
                    
                        </div>
                    
                      
                    
                        <div class="flex flex-col gap-1">
                            <label for="jenis_kelamin">Jenis Kelamin </label>
                            <select name="jenis_kelamin" id="">
                                <option value="L">Laki-laki</option>  
                                <option value="P">Perempuan</option>  
                            </select>
                        </div>
                    
                        <div class="flex flex-col gap-1">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="">
                        </div>
                    
                        <div class="flex flex-col gap-1">
                            <label for="agama">Agama </label>
                            <input type="text" name="agama" id="">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="=no_telp">No Telepon </label>
                            <input type="text" name="no_telp" id="">
                        </div>
                    
                        <div class="flex flex-col gap-1">
                            <label for="pekerjaan">Pekerjaan </label>
                            <input type="text" name="pekerjaan" id="">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="status_tinggal">Status Tinggal </label>
                            <select name="status_tinggal" id="">
                                <option value="tetap">Tetap</option>  
                                <option value="kontrak">Kontrak</option>  
                            </select>
                        </div>
                    
                        <div class="flex flex-col gap-1">
                            <label for="status_kematian">Status Kematian </label>
                            <select name="status_kematian" id="">
                                <option value="1">Meninggal</option>  
                                <option value="0">Hidup</option>  
                            </select>
                        </div>
                    
                    
                        <button type="submit" class="text-neutral-01 bg-blue-main hover:bg-dodger-blue-800   px-5 py-2 text-base font-medium rounded-full  ">Konfirmasi</button>
                    
                    </form>
                  </div>
                </div>
        </div>
           
    
        <div class="filter flex space-x-2 items-center">
           
            <div x-data="{open:false}" class="relative" >
                <button @click="open= !open" class="flex px-3 items-center space-x-5 py-2 border-2 border-neutral-400 rounded-full" ><i class="fa-solid fa-sliders"></i> <p>-semua-</p> <i class="fa fa-chevron-down"></i></button>
                <div class="absolute left-1/2 -translate-x-1/2  px-3 py-3 z-30 bg-white drop-shadow-card" x-show="open" @click.outside="open=false" >
                   <ul>
                    <li><button>date</button></li>
                    <li><button>status</button></li>
                    <li><button>1</button></li>
                    
                   </ul>
                </div>
            </div>
          
            <div class="search border-2 bg-neutral-04 rounded-full px-3">
                <i class="fa-solid fa-magnifying-glass"></i>

                <input type="text" class="border-none bg-transparent" placeholder="cari apapun">  
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
                      
                        <a href="/login" class="hover:border-none   text-blue-main bg-dodger-blue-50 hover:bg-dodger-blue-100  px-8 py-2 text-base font-medium rounded-full  ">Detail</a>
                    </td>
                    
                </tr>
                    @endforeach
                  
             
               
            </tbody>
        </table>
    </div>
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
    

@endsection

