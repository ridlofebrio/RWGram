@extends('layouts.template')

@section('content')
<div id="indicators-carousel" class="relative  w-full" data-carousel="static">
  <!-- Carousel wrapper -->
  <div class="relative  overflow-hidden h-[150px] sm:h-[250px]  md:h-[400px]  lg:h-[708px]">
       <!-- Item 1 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item="active">

        <div class="bg-gradient-to-t from-[#0096FF] opacity-50  to-transparent to-70%   z-10  absolute w-full h-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"></div>

          <div class="absolute z-20 font-main  w-full h-full">
              <div class=" mx-auto flex flex-col justify-end  max-w-7xl px-2 sm:px-6 lg:px-8 py-14 w-full h-full">
                  <h2 class="text-white text-xs md:text-2xl" >Sistem Informasi RW 06 - Kalirejo </h2>
                  <h1 class=" text-xs md:text-5xl font-bold text-white w-3/4" >Ayo ramaikan buka bersama puasa Ramadhan 1445H di Rumah Pak Sohib, pukul 15.00  </h1>
                 
          </div>
        </div>
          <img src="{{asset('asset/images/homepage.jpg')}}" class="absolute block w-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
       
          
      </div>
      <!-- Item 2 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <div class="bg-gradient-to-t from-[#0096FF] opacity-50  to-transparent to-70%   z-10  absolute w-full h-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"></div>

        <div class="absolute z-20 font-main  w-full h-full">
            <div class=" mx-auto flex flex-col justify-end  max-w-7xl px-2 sm:px-6 lg:px-8 py-14 w-full h-full">
                <h2 class="text-white text-2xl" >Sistem Informasi RW 06 - Kalirejo </h2>
                <h1 class="text-xl md:text-3xl font-bold text-white w-3/4" >Ayo ramaikan buka bersama puasa Ramadhan 1445H di Rumah Pak Sohib, pukul 15.00  </h1>
               
        </div>
      </div>
          <img src="{{asset('asset/images/homepage.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
      </div>
      <!-- Item 3 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <div class="bg-gradient-to-t from-[#0096FF] opacity-50  to-transparent to-70%   z-10  absolute w-full h-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"></div>

        <div class="absolute z-20 font-main  w-full h-full">
            <div class=" mx-auto flex flex-col justify-end  max-w-7xl px-2 sm:px-6 lg:px-8 py-14 w-full h-full">
                <h2 class="text-white text-2xl" >Sistem Informasi RW 06 - Kalirejo </h2>
                <h1 class=" text-xl md:text-3xl font-bold text-white w-3/4" >Ayo ramaikan buka bersama puasa Ramadhan 1445H di Rumah Pak Sohib, pukul 15.00  </h1>
               
        </div>
      </div>
          <img src="{{asset('asset/images/logo/Logo.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
      </div>
      <!-- Item 4 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <div class="bg-gradient-to-t from-[#0096FF] opacity-50  to-transparent to-70%   z-10  absolute w-full h-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"></div>

        <div class="absolute z-20 font-main  w-full h-full">
            <div class=" mx-auto flex flex-col justify-end  max-w-7xl px-2 sm:px-6 lg:px-8 py-14 w-full h-full">
                <h2 class="text-white text-2xl" >Sistem Informasi RW 06 - Kalirejo </h2>
                <h1 class=" text-xl md:text-5xl font-bold text-white w-3/4" >Ayo ramaikan buka bersama puasa Ramadhan 1445H di Rumah Pak Sohib, pukul 15.00  </h1>
               
        </div>
      </div>
          <img src="{{asset('asset/images/logo/Logo.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
      </div>
      <!-- Item 5 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <div class="bg-gradient-to-t from-[#0096FF] opacity-50  to-transparent to-70%   z-10  absolute w-full h-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"></div>

        <div class="absolute z-20 font-main  w-full h-full">
            <div class=" mx-auto flex flex-col justify-end  max-w-7xl px-2 sm:px-6 lg:px-8 py-14 w-full h-full">
                <h2 class="text-white text-2xl" >Sistem Informasi RW 06 - Kalirejo </h2>
                <h1 class="text-xl md:text-3xl font-bold text-white w-3/4" >Ayo ramaikan buka bersama puasa Ramadhan 1445H di Rumah Pak Sohib, pukul 15.00  </h1>
               
        </div>
      </div>
          <img src="{{asset('asset/images/logo/Logo.png')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
      </div>
  </div>
  <!-- Slider indicators -->
  <div class="absolute bg-neutral-400 opacity-50 px-3 py-2 rounded-xl z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
      <button type="button" class="w-2 h-2 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
      <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
      <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="2"></button>
      <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
      <button type="button" class="w-2 h-2 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
  </div>
  <!-- Slider controls -->
  <button type="button" class="md:flex  absolute top-0 start-0 z-30 hidden items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
      <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70  group-focus:outline-none">
          <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
          </svg>
          <span class="sr-only ">Previous</span>
      </span>
  </button>
  <button type="button" class="absolute top-0 end-0 z-30 md:flex hidden items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
      <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-black dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <span class="sr-only">Next</span>
      </span>
  </button>
</div>


<div class="about mx-auto max-w-7xl py-32 px-2 sm:px-6 lg:px-8 bg-white">
<div class="flex gap-12 flex-col md:flex-row w-full justify-center items-center h-full">
    <div class="img flex md:w-[300px] w-[200px] lg:w-[550px]  relative h-[350px]">
        
        <img class="w-64 absolute left-[1rem] top-0 rounded-xl" src="{{asset('asset/images/homepage.jpg')}}" alt="">
        <img class="w-64 absolute left-[3rem] bottom-[1rem] rounded-xl " src="{{asset('asset/images/homepage.jpg')}}" alt="">
        <img class="w-64 absolute right-[5rem] top-[5rem] rounded-xl " src="{{asset('asset/images/homepage.jpg')}}" alt="">
        
    </div>

    <div class="content w-1/2">

        <h1 href="#" class="text-dodger-blue-950 font-body font-bold text-5xl " >TENTANG <span class="text-dodger-blue-700" >RW</span>GRAM</h1>
        <br><br>
        
        <p class="text-xl" >RWGram bertujuan untuk mendigitalisasi sistem informasi di RW, memungkinkan akses yang lebih mudah dan efisien terhadap informasi penting, pengumuman, dan administrasi, serta memperkuat interaksi dan kolaborasi antarwarga </p>
    </div>
</div>
</div>

<div class="statis bg-dodger-blue-900">
    <div class="about mx-auto max-w-7xl py-10 px-2 sm:px-6 lg:px-8 ">
        <div class="flex flex-wrap text-white items-center h-full justify-between">
            <div class="info font-main font-bold">
                <h2 class="text-dodger-blue-200 text-2xl">RT 01</h2>
                <h1 class="text-white font-semibold text-2xl">231<span class="text-xl font-normal">penduduk</span></h1>
            </div>
            |
            <div class="info font-main font-bold">
                <h2 class="text-dodger-blue-200 text-2xl">RT 02</h2>
                <h1 class="text-white font-semibold text-2xl">134<span class="text-xl font-normal">penduduk</span></h1>
            </div>
            |
            <div class="info font-main font-bold">
                <h2 class="text-dodger-blue-200 text-2xl">RT 03</h2>
                <h1 class="text-white font-semibold text-2xl">59<span class="text-xl font-normal">penduduk</span></h1>
            </div>
            |
            <div class="info font-main font-bold">
                <h2 class="text-dodger-blue-200 text-2xl">RT 04</h2>
                <h1 class="text-white font-semibold text-2xl">192<span class="text-xl font-normal">penduduk</span></h1>
            </div>
        </div>
    </div>
</div>


<div class="pelayanan bg-white py-10">
    <div class="text-center font-main font-bold my-32">
        
    <h1 class="text-blue-main text-3xl">Sistem Informasi RW 06</h1>
    <h1 class="text-dodger-blue-900 text-5xl">Pelayanan Yang Tersedia</h1>
    </div>

    <div class="flex flex-wrap items-center gap-5 justify-around mb-32 px-10">  
        <div class="card">
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img src="{{asset('asset/icon/bulk/shop.svg')}}" alt="">
          
                    <h5 class="my-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">UMKM</h5>
             
                <p class="mb-3 font-normal text-black dark:text-gray-400">Anda bisa pengajuan UMKM, untuk memudahkan Anda dalam melakukan promosi dan mengembangkan usaha Anda.</p>
                <a href="#" class="inline-flex gap-2 font-medium items-center text-blue-main hover:text-dodger-blue-800">
                    Ajukan <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
        <div class="card">
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img src="{{asset('asset/icon/bulk/profile-2user.svg')}}" alt="">
          
                    <h5 class="my-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Status Nikah</h5>
             
                <p class="mb-3 font-normal text-black dark:text-gray-400">Anda bisa pengajuan UMKM, untuk memudahkan Anda dalam melakukan promosi dan mengembangkan usaha Anda.</p>
                <a href="#" class="inline-flex gap-2 font-medium items-center text-blue-main hover:text-dodger-blue-800">
                    Ajukan <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    
        <div class="card">
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img src="{{asset('asset/icon/bulk/house.svg')}}" alt="">
          
                    <h5 class="my-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Status Tempat Tinggal</h5>
             
                <p class="mb-3 font-normal text-black dark:text-gray-400">Anda bisa pengajuan UMKM, untuk memudahkan Anda dalam melakukan promosi dan mengembangkan usaha Anda.</p>
                <a href="#" class="inline-flex gap-2 font-medium items-center text-blue-main hover:text-dodger-blue-800">
                    Ajukan <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    
        <div class="card">
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img src="{{asset('asset/icon/bulk/profile-delete.svg')}}" alt="">
          
                    <h5 class="my-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Status Meninggal</h5>
             
                <p class="mb-3 font-normal text-black dark:text-gray-400">Anda bisa pengajuan UMKM, untuk memudahkan Anda dalam melakukan promosi dan mengembangkan usaha Anda.</p>
                <a href="#" class="inline-flex gap-2 font-medium items-center text-blue-main hover:text-dodger-blue-800">
                    Ajukan <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    
        <div class="card">
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img src="{{asset('asset/icon/bulk/messages-3.svg')}}" alt="">
          
                    <h5 class="my-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Pengaduan</h5>
             
                <p class="mb-3 font-normal text-black dark:text-gray-400">Anda bisa pengajuan UMKM, untuk memudahkan Anda dalam melakukan promosi dan mengembangkan usaha Anda.</p>
                <a href="#" class="inline-flex gap-2 font-medium items-center text-blue-main hover:text-dodger-blue-800">
                    Ajukan <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    
        <div class="card">
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img src="{{asset('asset/icon/bulk/3d-square.svg')}}" alt="">
          
                    <h5 class="my-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Bantuan Sosial</h5>
             
                <p class="mb-3 font-normal text-black dark:text-gray-400">Anda bisa pengajuan UMKM, untuk memudahkan Anda dalam melakukan promosi dan mengembangkan usaha Anda.</p>
                <a href="#" class="inline-flex gap-2 font-medium items-center text-blue-main hover:text-dodger-blue-800">
                    Ajukan <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    
        <div class="card">
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img src="{{asset('asset/icon/bulk/message.svg')}}" alt="">
          
                    <h5 class="my-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Pengumuman</h5>
             
                <p class="mb-3 font-normal text-black dark:text-gray-400">Anda bisa pengajuan UMKM, untuk memudahkan Anda dalam melakukan promosi dan mengembangkan usaha Anda.</p>
                <a href="#" class="inline-flex gap-2 font-medium items-center text-blue-main hover:text-dodger-blue-800">
                    Ajukan <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    
        <div class="card">
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img src="{{asset('asset/icon/bulk/profile-circle.svg')}}" alt="">
          
                    <h5 class="my-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Melihat Data Diri</h5>
             
                <p class="mb-3 font-normal text-black dark:text-gray-400">Anda bisa pengajuan UMKM, untuk memudahkan Anda dalam melakukan promosi dan mengembangkan usaha Anda.</p>
                <a href="#" class="inline-flex gap-2 font-medium items-center text-blue-main hover:text-dodger-blue-800">
                    Ajukan <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    
    
  
       
    </div>

    <div class="logo mb-32">
        <div class="flex flex-shrink-0 flex-col  gap-10 items-center">
            <img class="h-16 md:h-32 w-auto" src="{{asset('asset/icon/logo.svg')}}" alt="Your Company">
            <a href="#" class="text-dodger-blue-950 font-body font-bold text-3xl  md:text-7xl " > <span class="text-dodger-blue-700" >RW</span>GRAM</a>
          </div>
    </div>
</div>

@endsection