@extends('dashboard.template')

@section('content')

<button class="border p-2" onclick="document.body.classList.toggle('dark-mode')"> 
    Switch theme 
</button> 
<div class="text-sm px-5 overflow-x-auto py-5 font-medium text-center rounded-xl w-full bg-white  text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
       
      
    <div class="flex mt-3 w-full justify-end items-center">
        
        
    
    
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
                        Tanggal
                    </th>
                
                    <th scope="col" class="px-6 py-3">
                        NKK
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Keterangan
                    </th>

               
                </tr>
            </thead>
            <tbody id="body">
                
                    @foreach ($bansos as $bansos)
                 <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$bansos->bansos_id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$bansos->tanggal_bansos}}
                    </td>
                    <td class="px-6 py-4">
                        {{$bansos->kartuKeluarga->NKK}}
                    </td>
                    <td class="px-6 py-4">
                        {{$bansos->status}}
                    </td>
           
                    <td class="px-6 py-4 flex gap-2 ">
                      
                        <button data-modal-target="crud-modal-{{$bansos->bansos_id}}" data-modal-toggle="crud-modal-{{$bansos->bansos_id}}" class="hover:border-none  before:absolute text-blue-main bg-dodger-blue-50 hover:bg-dodger-blue-100  px-8 py-2 text-base font-medium rounded-full  " type="button">
                            Detail
                          </button>
                          
                          <!-- Main modal -->
                          <div id="crud-modal-{{$bansos->bansos_id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                              <div class="relative p-4 w-full max-w-md max-h-full">
                                  <!-- Modal content -->
                                  <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                      <!-- Modal header -->
                                      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Detail
                                          </h3>
                                          <button type="button" class="absolute -top-5 -right-4 bg-blue-main   text-white border-2 border-white hover:bg-gray-200 hover:text-gray-900 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-toggle="crud-modal-{{$bansos->bansos_id}}">
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
                                                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                  <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                                              </div>
                                              <div class="col-span-2 sm:col-span-1">
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
                                              </div>
                                              <div class="col-span-2">
                                                  <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                                                  <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here"></textarea>                    
                                              </div>
                                          </div>
                                          <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                              <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                              Add new product
                                          </button>
                                      </form>
                                  </div>
                              </div>
                              </div>
                        <form action="{{url('/bansos/'.$bansos->bansos_id)}}" onsubmit="return alert('are You sure ?')" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="hover:border-none  hover:bg-dodger-blue-100  px-8 py-2 text-base font-medium rounded-full  "><svg   xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path  stroke="#EE0B0B" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 5.98c-3.33-.33-6.68-.5-10.02-.5-1.98 0-3.96.1-5.94.3L3 5.98m5.5-1.01.22-1.31C8.88 2.71 9 2 10.69 2h2.62c1.69 0 1.82.75 1.97 1.67l.22 1.3m3.35 4.17-.65 10.07C18.09 20.78 18 22 15.21 22H8.79C6 22 5.91 20.78 5.8 19.21L5.15 9.14m5.18 7.36h3.33m-4.16-4h5"/>
                              </svg>
                            </button>
                        </form>
                     
                    </td>
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
            <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><i class="fa-solid fa-chevron-right"></i></a>
          </li>
        </ul>
      </nav>
</div>
    
  
    </div>
    

@endsection

