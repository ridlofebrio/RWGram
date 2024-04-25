@extends('dashboard.template')

@section('content')

    <div class="flex gap-5 justify-between font-body">
        <div class="left w-1/2 ">
            <h1 class="font-body font-semibold text-black" >Ringkasan</h1>
            <div class="h-full flex w-full justify-around">
                    <div class="row-left flex flex-col justify-around">
                        <div class="card bg-white rounded-xl px-5 py-7">
                                <div class="flex space-x-3 items-center">
                                    <div class="icon bg-dodger-blue-100 px-3 py-2 rounded-xl">
                                        <img class="w-6" src="{{asset('asset/icon/bulk/people.svg')}}" alt="">
                                    </div>
                                    <h1 class="text-neutral-06" >Jumlah Penduduk</h1>
                                </div>
    
                                <div class="flex w-full mt-10 space-x-44 items-center ">
                                    <h1 class="text-3xl font-semibold" >636</h1>
                                    <a href="">show</a>
                                </div>
                                
    
                        </div>
                        <div class="card bg-white rounded-xl px-5 py-7">
                            <div class="flex space-x-3 items-center">
                                <div class="icon bg-dodger-blue-100 px-3 py-2 rounded-xl">
                                    <img class="w-6" src="{{asset('asset/icon/bulk/shop.svg')}}" alt="">
    
                                </div>
                                <h1 class="text-neutral-06" >Jumlah UMKM</h1>
                            </div>
    
                            <div class="flex w-full mt-10 space-x-44 items-center ">
                                <h1 class="text-3xl font-semibold" >636</h1>
                                <a href="">show</a>
                            </div>
                            
    
                    </div>
                    </div>
                    <div class="row-right flex flex-col justify-around">
                        <div class="card bg-white rounded-xl px-5 py-7">
                            <div class="flex space-x-3 items-center">
                                <div class="icon bg-dodger-blue-100 px-3 py-2 rounded-xl">
                                    <img class="w-6" src="{{asset('asset/icon/bulk/messages-3.svg')}}" alt="">
                                </div>
                                <h1 class="text-neutral-06" >Jumlah Pengaduan</h1>
                            </div>
    
                            <div class="flex w-full mt-10 space-x-44 items-center ">
                                <h1 class="text-3xl font-semibold" >636</h1>
                                <a href="">show</a>
                            </div>
                            
    
                    </div>
                    <div class="card bg-white rounded-xl px-5 py-7">
                        <div class="flex space-x-3 items-center">
                            <div class="icon bg-dodger-blue-100 px-3 py-2 rounded-xl">
                                <img class="w-6" src="{{asset('asset/icon/bulk/directbox.svg')}}" alt="">
                            </div>
                            <h1 class="text-neutral-06" >Jumlah Permohonan</h1>
                        </div>
    
                        <div class="flex w-full mt-10 space-x-44 items-center ">
                            <h1 class="text-3xl font-semibold" >636</h1>
                            <a href="">show</a>
                        </div>
                        
    
                </div>
                    </div>
            </div>
        </div>
     
        
<div class="carousel w-1/2 ">
    <h1 class="font-body font-semibold mb-5 text-black" >Pengumuman</h1>
    <div id="default-carousel" class="relative w-full " data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56  overflow-hidden rounded-lg md:h-96">
             <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{asset('asset/images/homepage.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{asset('asset/images/homepage.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{asset('asset/images/homepage.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{asset('asset/images/homepage.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{asset('asset/images/profil.jpeg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
</div>



    </div>

@endsection