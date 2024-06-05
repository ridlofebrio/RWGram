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
            @if(count($kas) == 0)
        
            <td colspan="15" class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
               <h1 class="font-bold text-black text-xl">Data Tidak Ada</h1>
            </td>
    
            @endif
            @foreach ($kas as $item)
              
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      {{$loop->index +1 }}
                    </th>
                    <td class="px-6 py-4">
                   @if(Auth::user()->user_id == 1)
                   {{$item->user->nama_user}}
                   @else
                       {{$item->kartuKeluarga->penduduk->nama_penduduk}}
                   @endif
                    </td>
                   
                    <td scope="col" class="px-6 py-3">
                      
                      <i class=" fa-solid {{$item->Januari ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i>
                  </td>
                  <td scope="col" class="px-6 py-3">
                    <i class=" fa-solid {{$item->Februari ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i>
                  </td>
                  <td scope="col" class="px-6 py-3">
                    <i class=" fa-solid {{$item->Maret ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i>
                  </td>
                  <td scope="col" class="px-6 py-3">
                    <i class=" fa-solid {{$item->April ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i>
                </td>
                <td scope="col" class="px-6 py-3">
                  <i class=" fa-solid {{$item->Mei ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i>
              </td>
              <td scope="col" class="px-6 py-3">
                <i class=" fa-solid {{$item->Juni ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i>
                      </td>
                      <td scope="col" class="px-6 py-3">
                        <i class=" fa-solid {{$item->Juli ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i>
                    </td>
                    <td scope="col" class="px-6 py-3">
                      <i class=" fa-solid {{$item->Agustus ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i>
                  </td>
                  <td scope="col" class="px-6 py-3">
                    <i class=" fa-solid {{$item->September ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i>
                  </td>
                  <td scope="col" class="px-6 py-3">
                    <i class=" fa-solid {{$item->Oktober ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i>
                  </td>
                  <td scope="col" class="px-6 py-3">
                    <i class=" fa-solid {{$item->November ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i>
                  </td>
                  <td scope="col" class="px-6 py-3">
                    <i class=" fa-solid {{$item->Desember ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i>
                  </td>
        <td class="flex">
          <div x-cloak x-data="{ open: false }">
            <button  onclick="fetchDetail(event,{{$item->id_kas}})"  @click="open = true"  class="hover:border-none  before:absolute text-blue-main bg-dodger-blue-50 hover:bg-dodger-blue-100  px-8 py-2 text-base font-medium rounded-full  " type="button">
                Detail
              </button>
              
              <!-- Main modal -->
              <div  x-show="open"  x-transition tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed  z-40 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
              
                <div  class="absolute w-[920px] h-[80vh] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2  p-4  z-50 ">
                      <!-- Modal content -->
                      <div @click.outside="open = false" id='modal-{{$item->id_kas}}' class="relative bg-white w-full  rounded-lg shadow dark:bg-gray-700">
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
                          <form action="{{url('/kas')}}" method="POST"  class="p-4 md:p-5 text-left">
                            @csrf
                            @method('POST')
                            <div class="grid gap-4 mb-4 grid-cols-2">
                              @if(Auth::user()->user_id == 1)
                              <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sumber</label>
                                <input type="text" name="nama_user" id="name" value="{{$item->user->nama_user}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NKK" required="">
                            </div>
                           
                   @else
                   <div class="col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NKK</label>
                    <input type="text" name="NKK" id="name" value="{{$item->kartuKeluarga->kartuKeluarga->NKK}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NKK" required="">
                </div>
               
                   @endif
                                
                            </div>
  
          
  
                            <div id="list" >
                         
                            </div>
                            <button type="button" class="block w-full text-center text-white py-3 hover:bg-blue-main" onclick="addDetail(event,'modal-{{$item->id_kas}}')">+</button>
                            <button type="submit" class="text-white inline-flex items-center bg-blue-700 mt-5 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                              <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                              Simpan
                          </button> 
                          
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