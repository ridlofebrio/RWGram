@extends('dashboard.template')


@push('css')
    
<style>
    
    /* width */
    .scrollbar-sangar::-webkit-scrollbar {
      height: 7px;
      border-radius: 100%;
      
    }
    
    /* Track */
    .scrollbar-sangar::-webkit-scrollbar-track {
      background: white; 
       border-radius: 10px;
       
    }
     
    /* Handle */
    .scrollbar-sangar::-webkit-scrollbar-thumb {
      background: #0096FF; 
      border-radius: 10px;
      
        
    }
    
    /* Handle on hover */
    .scrollbar-sangar::-webkit-scrollbar-thumb:hover {
      background: #06A9FF; 
    }
    </style>
@endpush
@section('content')

<div class="justify-self-center col-span-1 carousel  xl:w-full">
    <h1 class=" font-semibold mb-5  text-2xl text-black" >Pengumuman</h1>
    <div id="default-carousel" class="relative w-full " data-carousel="slide">
        <!-- Carousel wrapper -->
      @foreach ($informasi as $item)
      <div class="relative h-[400px]  overflow-hidden rounded-lg ">
        <!-- Item 1 -->
        
       <div class="hidden duration-700 ease-in-out" data-carousel-item>
         <div class="absolute font-main  w-full z-50 h-full">
           <div class=" mx-auto flex flex-col justify-end   max-w-7xl px-2 sm:px-6 lg:px-8 py-14 w-full h-full">
               <h2 class="text-white text-md " >Sistem Informasi RW 06 - Kalirejo </h2>
               <h1 class=" text-md  font-bold text-white w-3/4" >{{$item->deskripsi_informasi}} </h1>
              
       </div>
     </div>
     <div class="bg-gradient-to-t from-[#0096FF] opacity-50  to-transparent to-70%   z-40 absolute w-full h-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"></div>
           <img src="{{asset('asset/images/homepage.jpg')}}" class="absolute block  w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
       </div>
       
      @endforeach
            <!-- Item 2 -->
            
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            @foreach ($informasi as $item)
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            @endforeach
           
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

<h1 class=" font-semibold mb-5 mt-5 text-2xl text-black" >Informasi</h1>

    <div class="max-w-[1400px] pb-5 mx-auto mt-5 overflow-x-auto scrollbar-sangar">
        <div class="w-full flex  space-x-8  ">
                @foreach ($pengumuman as $item)
                <section class="relative flex-shrink-0 ">
                    <div class=" duration-700 ease-in-out" data-carousel-item>
                        <div class="absolute font-main  w-full z-50 h-full">
                          <div class=" mx-auto flex flex-col justify-end   max-w-7xl px-2 sm:px-6 lg:px-8 py-14 w-full h-full">
                              <h2 class="text-white text-md " >Sistem Informasi RW 06 - Kalirejo </h2>
                              <h1 class=" text-md  font-bold text-white w-3/4" >{{$item->judul}} </h1>
                             
                      </div>
                    </div>
                    <div class="bg-gradient-to-t from-[#0096FF] opacity-50 rounded-xl  to-transparent to-70%   z-40 absolute w-full h-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"></div>
                          <img src="{{$item->foto_informasi}}" class=" block rounded-xl w-[500px] top-0 left-0" alt="...">
                      </div>
                      
                  </section>
                @endforeach
        </div>
    </div>
    
</div>
@endsection

@push('js')

<script>
    let scrollContainer =document.querySelector('.scrollbar-sangar');

    scrollContainer.addEventListener('mouseover',function (){
        scrollContainer.classList.remove("overflow-x-hidden"); // Remove mystyle class from DIV
            scrollContainer.classList.add("overflow-x-auto"); // Add newone class to DIV

    })
    
    scrollContainer.addEventListener('mouseout',function (){
        scrollContainer.classList.add("overflow-x-hidden"); // Remove mystyle class from DIV
            scrollContainer.classList.remove("overflow-x-auto"); // Add newone class to DIV

    })

    scrollContainer.addEventListener('wheel',(evt)=>{
       
        evt.preventDefault();
        scrollContainer.scrollLeft +=evt.deltaY;
        scrollContainer.style.scrollBehavior = "auto";
    });
</script>
@endpush