@if(Auth::user()->user_id != 2)
<aside id="separator-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full md:translate-x-0" aria-label="Sidebar">
   <div class="h-full flex flex-col justify-between">
      <div class="h-full font-body flex flex-col justify-between text-sm px-3 py-10 overflow-y-auto bg-white dark:bg-gray-800">
         <div class="top">
            <div class="logo">
               <div class="flex flex-shrink-0 space-x-3 justify-center items-center">
                   <img class="h-10 w-auto" src="https://res.cloudinary.com/dtzlizlrs/image/upload/v1717481970/ioxdtp815fvw1w3smkcc.png" alt="Your Company">
                   <a href="#" class="text-dodger-blue-950 font-body font-bold text-xl " > <span class="text-dodger-blue-700" >RW</span>GRAM</a>
                 </div>
           </div>
          <ul class="mt-12 space-y-2 font-medium">
             <li>
                <a href="{{url('dashboard')}}"  class="{{$active == 'beranda'? "bg-blue-main hover:bg-blue-main text-white":'hover:bg-gray-100'}}  flex items-center p-2 text-black rounded-lg dark:text-white  dark:hover:bg-gray-700 group" >
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path fill="{{$active == 'beranda'?'white':'#1B1B1B'}}" d="M17.79 22.75H6.21c-2.74 0-4.96-2.23-4.96-4.97v-7.41c0-1.36.84-3.07 1.92-3.91l5.39-4.2C10.18 1 12.77.94 14.45 2.12l6.18 4.33c1.19.83 2.12 2.61 2.12 4.06v7.28c0 2.73-2.22 4.96-4.96 4.96ZM9.48 3.44l-5.39 4.2c-.71.56-1.34 1.83-1.34 2.73v7.41a3.47 3.47 0 0 0 3.46 3.47h11.58c1.91 0 3.46-1.55 3.46-3.46v-7.28c0-.96-.69-2.29-1.48-2.83l-6.18-4.33c-1.14-.8-3.02-.76-4.11.09Z"/>
                    <path fill="{{$active == 'beranda'?'white':'#1B1B1B'}}" d="M12 18.75c-.41 0-.75-.34-.75-.75v-3c0-.41.34-.75.75-.75s.75.34.75.75v3c0 .41-.34.75-.75.75Z"/>
                  </svg>
                  
                   <span class="ms-3">Beranda</span>
                </a>
             </li>
             <li>
                <a href="{{url('dashboard/pengajuan')}}"  class="flex items-center {{$active == 'pengajuan'? "bg-blue-main hover:bg-blue-main text-white":'hover:bg-gray-100'}}  p-2 text-black rounded-lg dark:text-white  dark:hover:bg-gray-700 group">
                  
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="{{$active == 'pengajuan'?'white':'#1B1B1B'}}" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M7 12c-4 0-4 1.79-4 4v1c0 2.76 0 5 5 5h8c4 0 5-2.24 5-5v-1c0-2.21 0-4-4-4-1 0-1.28.21-1.8.6l-1.02 1.08a2.999 2.999 0 0 1-4.37 0L8.8 12.6C8.28 12.21 8 12 7 12Zm12 0V6c0-2.21 0-4-4-4H9C5 2 5 3.79 5 6v6"/>
                    <path stroke="{{$active == 'pengajuan'?'white':'#1B1B1B'}}" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.55 9.23h3.33m-4.16-3h5"/>
                  </svg>
                   <span class="flex-1 ms-3 whitespace-nowrap">Permohonan</span>

                </a>
             </li>
             <li>
                <a href="{{url('dashboard/pengaduan')}}"  class="flex items-center active:bg-blue-main p-2 text-black rounded-lg dark:text-white  dark:hover:bg-gray-700 group {{$active == 'pengaduan'? "bg-blue-main hover:bg-blue-main text-white":'hover:bg-gray-100'}}" >
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="{{$active == 'pengaduan'?'white':'#1B1B1B'}}" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M17.98 10.79v4c0 .26-.01.51-.04.75-.23 2.7-1.82 4.04-4.75 4.04h-.4c-.25 0-.49.12-.64.32l-1.2 1.6c-.53.71-1.39.71-1.92 0l-1.2-1.6a.924.924 0 0 0-.64-.32h-.4C3.6 19.58 2 18.79 2 14.79v-4c0-2.93 1.35-4.52 4.04-4.75.24-.03.49-.04.75-.04h6.4c3.19 0 4.79 1.6 4.79 4.79Z"/>
                    <path stroke="{{$active == 'pengaduan'?'white':'#1B1B1B'}}" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M21.98 6.79v4c0 2.94-1.35 4.52-4.04 4.75.03-.24.04-.49.04-.75v-4c0-3.19-1.6-4.79-4.79-4.79h-6.4c-.26 0-.51.01-.75.04C6.27 3.35 7.86 2 10.79 2h6.4c3.19 0 4.79 1.6 4.79 4.79Z"/>
                    <path stroke="{{$active == 'pengaduan'?'white':'#1B1B1B'}}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.495 13.25h.01m-3.51 0h.01m-3.51 0h.01"/>
                  </svg>
                   <span class="flex-1 ms-3 whitespace-nowrap">Pengaduan</span>
             
                </a>
             </li>

          </ul>
          <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
             <li>
                <a href="{{url('dashboard/penduduk')}}" class="{{$active == 'penduduk'? "bg-blue-main hover:bg-blue-main text-white":'hover:bg-gray-100'}}  flex items-center p-2 text-black transition duration-75 rounded-lg  dark:hover:bg-gray-700 dark:text-white group">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="{{$active == 'penduduk'?'white':'#1B1B1B'}}" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 7.16a.605.605 0 0 0-.19 0 2.573 2.573 0 0 1-2.48-2.58c0-1.43 1.15-2.58 2.58-2.58a2.58 2.58 0 0 1 2.58 2.58A2.589 2.589 0 0 1 18 7.16Zm-1.03 7.28c1.37.23 2.88-.01 3.94-.72 1.41-.94 1.41-2.48 0-3.42-1.07-.71-2.6-.95-3.97-.71M5.97 7.16c.06-.01.13-.01.19 0a2.573 2.573 0 0 0 2.48-2.58C8.64 3.15 7.49 2 6.06 2a2.58 2.58 0 0 0-2.58 2.58c.01 1.4 1.11 2.53 2.49 2.58ZM7 14.44c-1.37.23-2.88-.01-3.94-.72-1.41-.94-1.41-2.48 0-3.42 1.07-.71 2.6-.95 3.97-.71M12 14.63a.605.605 0 0 0-.19 0 2.573 2.573 0 0 1-2.48-2.58c0-1.43 1.15-2.58 2.58-2.58a2.58 2.58 0 0 1 2.58 2.58c-.01 1.4-1.11 2.54-2.49 2.58Zm-2.91 3.15c-1.41.94-1.41 2.48 0 3.42 1.6 1.07 4.22 1.07 5.82 0 1.41-.94 1.41-2.48 0-3.42-1.59-1.06-4.22-1.06-5.82 0Z"/>
                  </svg>
                  
                   <span class="ms-3">Data Penduduk</span>
                </a>
             </li>
             <li>
               <a href="{{url('dashboard/bansos')}}" class="{{$active == 'bansos'? "bg-blue-main hover:bg-blue-main text-white":'hover:bg-gray-100'}}  flex items-center p-2 text-black transition duration-75 rounded-lg  dark:hover:bg-gray-700 dark:text-white group">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="{{$active == 'bansos'?'white':'#1B1B1B'}}" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 22h6c5 0 7-2 7-7V9c0-5-2-7-7-7H9C4 2 2 4 2 9v6c0 5 2 7 7 7Z"/>
                    <path stroke="{{$active == 'bansos'?'white':'#1B1B1B'}}" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m6.7 9.26 5.3 3.07 5.26-3.05M12 17.77v-5.45"/>
                    <path stroke="{{$active == 'bansos'?'white':'#1B1B1B'}}" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m10.76 6.29-3.2 1.78c-.72.4-1.32 1.41-1.32 2.24v3.39c0 .83.59 1.84 1.32 2.24l3.2 1.78c.68.38 1.8.38 2.49 0l3.2-1.78c.72-.4 1.32-1.41 1.32-2.24v-3.4c0-.83-.59-1.84-1.32-2.24l-3.2-1.78c-.69-.38-1.81-.38-2.49.01Z"/>
                  </svg>
                  <span class="ms-3">Bansos</span>
               </a>
            </li>
             <li>
                <a href="{{url('dashboard/kas')}}" class="{{$active == 'kas'? "bg-blue-main hover:bg-blue-main text-white":'hover:bg-gray-100'}}  flex items-center p-2 text-black transition duration-75 rounded-lg  dark:hover:bg-gray-700 dark:text-white group">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="{{$active == 'kas'?'white':'#1B1B1B'}}" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 9H7m15 1.97v2.06c0 .55-.44 1-1 1.02h-1.96c-1.08 0-2.07-.79-2.16-1.87-.06-.63.18-1.22.6-1.63.37-.38.88-.6 1.44-.6H21c.56.02 1 .47 1 1.02Z"/>
                    <path stroke="{{$active == 'kas'?'white':'#1B1B1B'}}" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.48 10.55c-.42.41-.66 1-.6 1.63.09 1.08 1.08 1.87 2.16 1.87H21v1.45c0 3-2 5-5 5H7c-3 0-5-2-5-5v-7c0-2.72 1.64-4.62 4.19-4.94.26-.04.53-.06.81-.06h9c.26 0 .51.01.75.05C19.33 3.85 21 5.76 21 8.5v1.45h-2.08c-.56 0-1.07.22-1.44.6Z"/>
                  </svg>
                   <span class="ms-3">Kas</span>
                </a>
             </li>
             <li>
                <a href="{{url('/dashboard/persuratan')}}" class="{{$active == 'persuratan'? "bg-blue-main hover:bg-blue-main text-white":'hover:bg-gray-100'}} flex items-center p-2 text-black transition duration-75 rounded-lg  dark:hover:bg-gray-700 dark:text-white group">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path fill="{{$active == 'persuratan'?'white':'#1B1B1B'}}" d="M15 22.75H9c-5.43 0-7.75-2.32-7.75-7.75V9c0-5.43 2.32-7.75 7.75-7.75h5c.41 0 .75.34.75.75s-.34.75-.75.75H9C4.39 2.75 2.75 4.39 2.75 9v6c0 4.61 1.64 6.25 6.25 6.25h6c4.61 0 6.25-1.64 6.25-6.25v-5c0-.41.34-.75.75-.75s.75.34.75.75v5c0 5.43-2.32 7.75-7.75 7.75Z"/>
                    <path fill="{{$active == 'persuratan'?'white':'#1B1B1B'}}" d="M22 10.75h-4c-3.42 0-4.75-1.33-4.75-4.75V2c0-.3.18-.58.46-.69.28-.12.6-.05.82.16l8 8a.751.751 0 0 1-.53 1.28Zm-7.25-6.94V6c0 2.58.67 3.25 3.25 3.25h2.19l-5.44-5.44ZM13 13.75H7c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h6c.41 0 .75.34.75.75s-.34.75-.75.75Zm-2 4H7c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h4c.41 0 .75.34.75.75s-.34.75-.75.75Z"/>
                  </svg>
                   <span class="ms-3">Persuratan</span>
                </a>
             </li>
           
               
          </ul>
         </div>

        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
         <li>
            <a href="{{url('logout')}}"  class="flex items-center active:bg-blue-main p-2 text-black rounded-lg dark:text-white  dark:hover:bg-gray-700 group hover:bg-gray-100" >
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                 <path stroke="#EE0B0B" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.9 7.56c.31-3.6 2.16-5.07 6.21-5.07h.13c4.47 0 6.26 1.79 6.26 6.26v6.52c0 4.47-1.79 6.26-6.26 6.26h-.13c-4.02 0-5.87-1.45-6.2-4.99M15 12H3.62m2.23-3.35L2.5 12l3.35 3.35"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap text-red-500">Log Out</span>
              
            </a>
         </li>


      </ul>


     </div>
      {{-- <div class="end pb-5 px-3 w-full flex items-end">
         <ul class="mt-12 space-y-2 w-full font-medium">
            <li>
               <a href="#" class="flex items-center p-2 text-red-600 transition duration-75 rounded-lg hover:bg-gray-100  dark:hover:bg-gray-700 dark:text-white group">
    @@ -98,10 +269,8 @@
            </li>
         </ul>
        
       </div> --}}
   </div>

 </aside>
@else

<aside id="separator-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full md:translate-x-0" aria-label="Sidebar">
   <div class="h-full flex flex-col justify-between">
      <div class="h-full font-body flex flex-col justify-between text-sm px-3 py-10 overflow-y-auto bg-white dark:bg-gray-800">
         <div class="top">
            <div class="logo">
               <div class="flex flex-shrink-0 space-x-3 justify-center items-center">
                   <img class="h-10 w-auto" src="https://res.cloudinary.com/dtzlizlrs/image/upload/v1717481970/ioxdtp815fvw1w3smkcc.png" alt="Your Company">
                   <a href="#" class="text-dodger-blue-950 font-body font-bold text-xl " > <span class="text-dodger-blue-700" >RW</span>GRAM</a>
                 </div>
           </div>
          <ul class="mt-12 space-y-2 font-medium">
             <li>
                <a href="{{url('karangTaruna/')}}"  class="{{$active == 'beranda'? "bg-blue-main hover:bg-blue-main text-white":'hover:bg-gray-100'}}  flex items-center p-2 text-black rounded-lg dark:text-white  dark:hover:bg-gray-700 group" >
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path fill="{{$active == 'beranda'?'white':'#1B1B1B'}}" d="M17.79 22.75H6.21c-2.74 0-4.96-2.23-4.96-4.97v-7.41c0-1.36.84-3.07 1.92-3.91l5.39-4.2C10.18 1 12.77.94 14.45 2.12l6.18 4.33c1.19.83 2.12 2.61 2.12 4.06v7.28c0 2.73-2.22 4.96-4.96 4.96ZM9.48 3.44l-5.39 4.2c-.71.56-1.34 1.83-1.34 2.73v7.41a3.47 3.47 0 0 0 3.46 3.47h11.58c1.91 0 3.46-1.55 3.46-3.46v-7.28c0-.96-.69-2.29-1.48-2.83l-6.18-4.33c-1.14-.8-3.02-.76-4.11.09Z"/>
                    <path fill="{{$active == 'beranda'?'white':'#1B1B1B'}}" d="M12 18.75c-.41 0-.75-.34-.75-.75v-3c0-.41.34-.75.75-.75s.75.34.75.75v3c0 .41-.34.75-.75.75Z"/>
                  </svg>
                  
                   <span class="ms-3">Beranda</span>
                </a>
             </li>
             <li>
                <a href="{{url('karangTaruna/informasi')}}"  class="flex items-center {{$active == 'informasi'? "bg-blue-main hover:bg-blue-main text-white":'hover:bg-gray-100'}}  p-2 text-black rounded-lg dark:text-white  dark:hover:bg-gray-700 group">
                  
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="{{$active == 'informasi'?'white':'#1B1B1B'}}" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M7 12c-4 0-4 1.79-4 4v1c0 2.76 0 5 5 5h8c4 0 5-2.24 5-5v-1c0-2.21 0-4-4-4-1 0-1.28.21-1.8.6l-1.02 1.08a2.999 2.999 0 0 1-4.37 0L8.8 12.6C8.28 12.21 8 12 7 12Zm12 0V6c0-2.21 0-4-4-4H9C5 2 5 3.79 5 6v6"/>
                    <path stroke="{{$active == 'informasi'?'white':'#1B1B1B'}}" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.55 9.23h3.33m-4.16-3h5"/>
                  </svg>
                   <span class="flex-1 ms-3 whitespace-nowrap">Informasi</span>

                </a>
             </li>
             <li>
                <a href="{{url('karangTaruna/pengumuman')}}"  class="flex items-center active:bg-blue-main p-2 text-black rounded-lg dark:text-white  dark:hover:bg-gray-700 group {{$active == 'pengumuman'? "bg-blue-main hover:bg-blue-main text-white":'hover:bg-gray-100'}}" >
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="{{$active == 'pengumuman'?'white':'#1B1B1B'}}" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M17.98 10.79v4c0 .26-.01.51-.04.75-.23 2.7-1.82 4.04-4.75 4.04h-.4c-.25 0-.49.12-.64.32l-1.2 1.6c-.53.71-1.39.71-1.92 0l-1.2-1.6a.924.924 0 0 0-.64-.32h-.4C3.6 19.58 2 18.79 2 14.79v-4c0-2.93 1.35-4.52 4.04-4.75.24-.03.49-.04.75-.04h6.4c3.19 0 4.79 1.6 4.79 4.79Z"/>
                    <path stroke="{{$active == 'pengumuman'?'white':'#1B1B1B'}}" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M21.98 6.79v4c0 2.94-1.35 4.52-4.04 4.75.03-.24.04-.49.04-.75v-4c0-3.19-1.6-4.79-4.79-4.79h-6.4c-.26 0-.51.01-.75.04C6.27 3.35 7.86 2 10.79 2h6.4c3.19 0 4.79 1.6 4.79 4.79Z"/>
                    <path stroke="{{$active == 'pengumuman'?'white':'#1B1B1B'}}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.495 13.25h.01m-3.51 0h.01m-3.51 0h.01"/>
                  </svg>
                   <span class="flex-1 ms-3 whitespace-nowrap">Pengumuman</span>
             
                </a>
             </li>

        
         </div>

        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
         <li>
            <a href="{{url('logout')}}"  class="flex items-center active:bg-blue-main p-2 text-black rounded-lg dark:text-white  dark:hover:bg-gray-700 group hover:bg-gray-100" >
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                 <path stroke="#EE0B0B" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.9 7.56c.31-3.6 2.16-5.07 6.21-5.07h.13c4.47 0 6.26 1.79 6.26 6.26v6.52c0 4.47-1.79 6.26-6.26 6.26h-.13c-4.02 0-5.87-1.45-6.2-4.99M15 12H3.62m2.23-3.35L2.5 12l3.35 3.35"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap text-red-500">Log Out</span>
              
            </a>
         </li>


      </ul>


     </div>
      {{-- <div class="end pb-5 px-3 w-full flex items-end">
         <ul class="mt-12 space-y-2 w-full font-medium">
            <li>
               <a href="#" class="flex items-center p-2 text-red-600 transition duration-75 rounded-lg hover:bg-gray-100  dark:hover:bg-gray-700 dark:text-white group">
    @@ -98,10 +269,8 @@
            </li>
         </ul>
        
       </div> --}}
   </div>

 </aside>
@endif