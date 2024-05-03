@extends('dashboard.template')

@section('content')
@if ( Session::has('errors'))
<div class="absolute bg-white drop-shadow-card top-0 left-1/2 -translate-x-1/2">
    <h1 class="text-red-500 font-body text-bold">{{$errors}}</h1>
</div>
@endif
    <div class="flex flex-wrap gap-5 justify-between font-body">
  
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
     
        
<div class="carousel w-[528px] ">
    <h1 class="font-body font-semibold mb-5 text-black" >Pengumuman</h1>
    <div id="default-carousel" class="relative w-full " data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-[326px]  overflow-hidden rounded-lg ">
             <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{asset('asset/images/homepage.jpg')}}" class="absolute block  w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
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


<div class="w-1/2 bg-white rounded-lg shadow dark:bg-gray-800">
    <h1 class="font-body font-semibold mb-5 text-black" >Kas</h1>
    <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
      <div>
        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">$12,423</h5>
        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Sales this week</p>
      </div>
      <div
        class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
        23%
        <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
        </svg>
      </div>
    </div>


    <div id="labels-chart" class="px-2.5"></div>
    <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-5 p-4 md:p-6 pt-0 md:pt-0">
      <div class="flex justify-between items-center pt-5">
        <!-- Button -->
        <button
          id="dropdownDefaultButton"
          data-dropdown-toggle="lastDaysdropdown"
          data-dropdown-placement="bottom"
          class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
          type="button">
          Last 7 days
          <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
          </svg>
        </button>
        <!-- Dropdown menu -->
        <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 90 days</a>
              </li>
            </ul>
        </div>
        <a
          href="#"
          class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
          Sales Report
          <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
        </a>
      </div>
    </div>
  </div>
  
  


 
  
    </div>

@endsection

@push('js')
<script>

const options = {
// set the labels option to true to show the labels on the X and Y axis
xaxis: {
  show: true,
  categories: ['01 Feb', '02 Feb', '03 Feb', '04 Feb', '05 Feb', '06 Feb', '07 Feb'],
  labels: {
    show: true,
    style: {
      fontFamily: "Inter, sans-serif",
      cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
    }
  },
  axisBorder: {
    show: false,
  },
  axisTicks: {
    show: false,
  },
},
yaxis: {
  show: true,
  labels: {
    show: true,
    style: {
      fontFamily: "Inter, sans-serif",
      cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
    },
    formatter: function (value) {
      return '$' + value;
    }
  }
},
series: [
  {
    name: "Developer Edition",
    data: [150, 141, 145, 152, 135, 125],
    color: "#1A56DB",
  },
  {
    name: "Designer Edition",
    data: [150, 13, 65, 12, 42, 73],
    color: "#7E3BF2",
  },
],
chart: {
  sparkline: {
    enabled: false
  },
  height: "100%",
  width: "100%",
  type: "area",
  fontFamily: "Inter, sans-serif",
  dropShadow: {
    enabled: false,
  },
  toolbar: {
    show: false,
  },
},
tooltip: {
  enabled: true,
  x: {
    show: false,
  },
},
fill: {
  type: "gradient",
  gradient: {
    opacityFrom: 0.55,
    opacityTo: 0,
    shade: "#1C64F2",
    gradientToColors: ["#1C64F2"],
  },
},
dataLabels: {
  enabled: false,
},
stroke: {
  width: 6,
},
legend: {
  show: false
},
grid: {
  show: false,
},
}

if (document.getElementById("labels-chart") && typeof ApexCharts !== 'undefined') {
const chart = new ApexCharts(document.getElementById("labels-chart"), options);
chart.render();
}


</script>
@endpush