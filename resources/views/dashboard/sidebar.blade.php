

 
 <aside id="separator-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full flex flex-col justify-between">
      <div class="h-full font-body text-sm px-3 py-10 overflow-y-auto bg-white dark:bg-gray-800">
         <div class="logo">
             <div class="flex flex-shrink-0 space-x-3 justify-center items-center">
                 <img class="h-10 w-auto" src="{{asset('asset/images/logo/logo.png')}}" alt="Your Company">
                 <a href="#" class="text-dodger-blue-950 font-body font-bold text-xl " > <span class="text-dodger-blue-700" >RW</span>GRAM</a>
               </div>
         </div>
        <ul class="mt-12 space-y-2 font-medium">
           <li>
              <a href="{{url('dashboard')}}"  class="{{$active == 'beranda'? "bg-blue-main hover:bg-blue-main text-white":'hover:bg-gray-100'}}  flex items-center p-2 text-black rounded-lg dark:text-white  dark:hover:bg-gray-700 group" >
                <i class="fa-solid fa-house text-xl text-black transition duration-75" ></i>
                 <span class="ms-3">Beranda</span>
              </a>
           </li>
           <li>
              <a href="{{url('dashboard/pengajuan')}}"  class="flex items-center {{$active == 'pengajuan'? "bg-blue-main hover:bg-blue-main text-white":'hover:bg-gray-100'}}  p-2 text-black rounded-lg dark:text-white  dark:hover:bg-gray-700 group">
                <i class="fa-solid fa-print text-xl text-black transition duration-75" ></i>
                 <span class="flex-1 ms-3 whitespace-nowrap">Permohonan</span>
                 
              </a>
           </li>
           <li>
              <a href="{{url('dashboard/pengaduan')}}"  class="flex items-center active:bg-blue-main p-2 text-black rounded-lg dark:text-white  dark:hover:bg-gray-700 group {{$active == 'pengaduan'? "bg-blue-main hover:bg-blue-main text-white":'hover:bg-gray-100'}}" >
                <i class="fa-solid fa-comments text-xl text-black transition duration-75" ></i>
                 <span class="flex-1 ms-3 whitespace-nowrap">Pengaduan</span>
                 <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
              </a>
           </li>
          
        </ul>
        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
           <li>
              <a href="{{url('dashboard/penduduk')}}" class="{{$active == 'penduduk'? "bg-blue-main hover:bg-blue-main text-white":'hover:bg-gray-100'}}  flex items-center p-2 text-black transition duration-75 rounded-lg  dark:hover:bg-gray-700 dark:text-white group">
                <i class="fa-solid fa-user-group text-xl text-black transition duration-75" ></i>
                 <span class="ms-3">Data Penduduk</span>
              </a>
           </li>
           <li>
              <a href="#" class="{{$active == 'kas'? "bg-blue-main hover:bg-blue-main text-white":'hover:bg-gray-100'}}  flex items-center p-2 text-black transition duration-75 rounded-lg  dark:hover:bg-gray-700 dark:text-white group">
                <i class="fa-solid fa-wallet text-xl text-black transition duration-75" ></i>
                 <span class="ms-3">Kas</span>
              </a>
           </li>
           <li>
              <a href="#" class="{{$active == 'persuratan'? "bg-blue-main hover:bg-blue-main text-white":'hover:bg-gray-100'}} flex items-center p-2 text-black transition duration-75 rounded-lg  dark:hover:bg-gray-700 dark:text-white group">
                <i class="fa-solid fa-envelope text-xl text-black transition duration-75" ></i>
                 <span class="ms-3">Persuratan</span>
              </a>
           </li>
           <li>
              <a href="#" class="{{$active == 'akun'? "bg-blue-main hover:bg-blue-main text-white":'hover:bg-gray-100'}}  flex items-center p-2 text-black transition duration-75 rounded-lg  dark:hover:bg-gray-700 dark:text-white group">
                <i class="fa-solid fa-user text-xl text-black transition duration-75" ></i>
                 <span class="ms-3">Akun</span>
              </a>
           </li>
             <li>
             <a href="#" class="{{$active == 'sandi'? "bg-blue-main hover:bg-blue-main text-white":'hover:bg-gray-100'}}  flex items-center p-2 text-black transition duration-75 rounded-lg  dark:hover:bg-gray-700 dark:text-white group">
                <i class="fa-solid fa-key text-xl text-black transition duration-75" ></i>
                <span class="ms-3">Ubah Sandi</span>
             </a>
          </li>
        </ul>
 
     </div>
      {{-- <div class="end pb-5 px-3 w-full flex items-end">
         <ul class="mt-12 space-y-2 w-full font-medium">
            <li>
               <a href="#" class="flex items-center p-2 text-red-600 transition duration-75 rounded-lg hover:bg-gray-100  dark:hover:bg-gray-700 dark:text-white group">
                  <i class="fa fa-sign-out text-xl text-red-600 transition duration-75" ></i>
                  <span class="ms-3">Log out</span>
               </a>
            </li>

         </ul>
        
       </div> --}}
   </div>
   
 </aside>
 
 