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
        
            @foreach ($data as $status)
         <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$status->id_status_tinggal}}
            </th>
            <td class="px-6 py-4">
                {{$status->nama_pengaju}}
            </td>
            <td class="px-6 py-4">
                {{$status->alamat_asal}}
            </td>
            <td class="px-6 py-4">
                {{$status->status}}
            </td>
            <td class="px-6 py-4">
                <div class="px-2 py-2 w-[113px] {{$status->status_laporan=='selesai'? 'bg-[#CCF1E5]':'bg-[#FBF4CF]'}}  rounded-full flex items-center gap-2  justify-center">
                    <div class="w-2 h-2 {{$status->status_laporan=='selesai'? 'bg-green-400':'bg-yellow-300'}} rounded-full"></div>
                    <p class="font-body font-semibold {{$status->status_laporan=='selesai'? 'text-green-400':'text-yellow-300'}}">

                            {{$status->status_pengajuan}}

                    </p>
            </div>
            </td>
        
            <td class="px-6 py-4 flex gap-2 ">

                <a href="/login" class="text-neutral-01 bg-blue-main hover:bg-dodger-blue-800   px-5 py-2 text-base font-medium rounded-full  ">Konfirmasi</a>
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
                                      <button type="button" @click="open = false" class="absolute -top-5 -right-4 bg-blue-main   text-white border-2 border-white hover:bg-gray-200 hover:text-gray-900 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center ">
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
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pengaju</label>
                                            <input readonly type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" value="{{$status->nama_pengaju}}" required="">
                                        </div>
                                        <div class="col-span-2">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Asal</label>
                                            <input readonly type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" value="{{$status->alamat_asal}}" required="">
                                        </div>
                                        <div class="col-span-2">
                                          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                          <input readonly type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" value="{{$status->alamat_pindah}}" required="">
                                      </div>
                                     
                                      <div class="col-span-2">
                                          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                                          <img src="{{asset('images/'.$status->foto_bukti)}}" alt="Foto Bukti">
                                      </div>
                                     
                                        {{-- <div class="col-span-2 sm:col-span-1">
                                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                            <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                            <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option selected="">Select category</option>
                                                <option value="TV">TV/Monitors</option>
                                                <option value="PC">PC</option>
                                                <option value="GA">Gaming/Console</option>
                                                <option value="PH">Phones</option>
                                            </select>
                                        </div> --}}
                                       
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