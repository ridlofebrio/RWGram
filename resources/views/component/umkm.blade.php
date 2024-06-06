
@inject('adminApi', \Cloudinary\Api\Admin\AdminApi::class)
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
            
                @foreach ($umkm as $item)
             <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$item->umkm_id}}
                </th>
                <td class="px-6 py-4">
                    {{$item->tanggal_umkm}}
                </td>
                <td class="px-6 py-4">
                    {{$item->penduduk->nama_penduduk}}
                </td>
                <td class="px-6 py-4">
                    {{$item->nama_umkm}}
                </td>
                <td class="px-6 py-4">
                    <div class="px-2 py-2 w-[113px] {{$item->status_pengajuan=='diterima'? 'bg-[#CCF1E5]':'bg-[#FBF4CF]'}}  rounded-full flex items-center gap-2  justify-center">
                        <div class="w-2 h-2 {{$item->status_pengajuan=='diterima'? 'bg-green-400':'bg-yellow-300'}} rounded-full"></div>
                        <p class="font-body font-semibold {{$item->status_pengajuan=='diterima'? 'text-green-400':'text-yellow-300'}}">
    
                                {{$item->status_pengajuan}}
    
                        </p>
                </div>
                </td>
            
                <td class="px-6 py-4 flex gap-2 ">
                    
                    <div x-data= "{open:false}">

                        <button @click="open= true"  class="text-neutral-01 bg-blue-main hover:bg-dodger-blue-800   px-5 py-2 text-base font-medium rounded-full disabled:bg-neutral-06 " {{$item->status_pengajuan=='diterima'?"disabled ":""}}>Konfirmasi</button>
                        <div x-show="open"  class="overflow-y-auto overflow-x-hidden fixed  z-40 justify-center items-center w-full inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div @click.outside="open = false" class="absolute text-center w-full max-w-[500px] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 rounded-2xl  p-4 bg-white z-50">
                                <h1 class="text-xl mb-5">Apakah anda yakin ingin mengkonfirmasi permohonan UMKM ini ?</h1>
                               <div class="flex w-full space-x-7 justify-center">
                                <button class="text-blue-main border-2 border-dodger-blue-800  hover:bg-dodger-blue-800  hover:text-white  px-5 py-2 text-base font-medium rounded-full">Lihat Detail</button>
                               <form action="{{url('konfirmasi/umkm/'.$item->umkm_id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                    <input type="hidden" name="status_pengajuan" value="diterima">
                                <button type="submit" class="text-neutral-01 bg-blue-main hover:bg-dodger-blue-800   px-5 py-2 text-base font-medium rounded-full">Konfirmasi</button>
                               </form>
                               </div>

                            </div>
                            <div class="bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40"></div> 
                        </div>

                    </div>
                    <div x-data="{ open: false }">
                        <button @click="open = true"   class="hover:border-none  before:absolute text-blue-main bg-dodger-blue-50 hover:bg-dodger-blue-100  px-8 py-2 text-base font-medium rounded-full  " type="button">
                            Detail
                          </button>
                          
                          <!-- Main modal -->
                          <div id="modal-{{$item->umkm_id}}"  x-show="open"   tabindex="-1" aria-hidden="true" class="overflow-y-auto  fixed  z-40 justify-center items-center w-full inset-0 h-[calc(100%-1rem)] max-h-full">
                          
                            <div  class="absolute w-full max-w-[920px] h-[80vh] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2  p-4  z-50 ">
                                  <!-- Modal content -->
                                  <div @click.outside="open = false" class="relative bg-white w-full  rounded-lg shadow dark:bg-gray-700">
                                      <!-- Modal header -->
                                      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Detail
                                          </h3>
                                          <button type="button" @click="open = false" class="absolute -top-5 -right-4 bg-blue-main   text-white border-2 border-white hover:bg-gray-200 hover:text-gray-900 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-toggle="crud-modal-{{$item->umkm_id}}">
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
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal UMKM</label>
                                                <input readonly type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" value="{{$item->tanggal_umkm}}" required="">
                                            </div>
                                            <div class="col-span-2">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama UMKM</label>
                                                <input readonly type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" value="{{$item->nama_umkm}}" required="">
                                            </div>
                                            <div class="col-span-2">
                                              <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi UMKM</label>
                                              <input readonly type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" value="{{$item->lokasi_umkm}}" required="">
                                          </div>
                                          <div class="col-span-2">
                                              <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Anda</label>
                                              <input readonly type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" value="{{$item->penduduk->nama_penduduk}}" required="">
                                          </div>
                                          <div class="col-span-2">
                                              <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Laporan</label>
                                              <textarea readonly id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="Write product description here">{{$item->deskripsi_umkm}}</textarea>           
                                          </div>
                                          <div class="col-span-2">
                                            {{-- @php($result = (array) (new $adminApi)->assetByAssetId("3c16fa34033ee2110ddceab721812f07")) --}}
                                            
                                              <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                                              <img src="{{$item->foto_umkm == null ? 'https://res.cloudinary.com/dtzlizlrs/image/upload/v1717600371/ovayldsch5461a8ffv3m.jpg':$item->foto_umkm}}" loading="lazy" alt="Foto Bukti">
                                          </div>
                                          <div class="col-span-2">
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link Media Sosial</label>
                                            <input readonly type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" value="{{$item->link_medsos}}" required="">
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
  



    <nav aria-label="Page navigation example" class="Page mt-5 text-right" >
        <ul class="inline-flex -space-x-px text-sm">
          <li>
            <button {{$umkm->previousPageUrl()?'':'disabled'}} onclick="page(event,'{{$umkm->previousPageUrl()}}')" class="pagination disabled:bg-neutral-04  flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><i class="fa-solid fa-chevron-left"></i></button>
          </li>
          <li>
            <a href="#" class=" flex items-center justify-center px-3 h-8 bg-blue-main leading-tight  text-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{$umkm->currentPage()}}</a>
          </li>
         
          <li>
            <button  {{$umkm->nextPageUrl()?'':'disabled'}}  onclick="page(event,'{{$umkm->nextPageUrl()}}')" class="pagination disabled:bg-neutral-04  flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><i class="fa-solid fa-chevron-right"></i></button>
          </li>
        </ul>
      </nav>
    </div>

