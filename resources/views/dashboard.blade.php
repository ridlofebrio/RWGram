@extends('dashboard.template')

@section('content')
@if ( Session::has('errors'))
<div class="absolute bg-white drop-shadow-card top-0 left-1/2 -translate-x-1/2">
    <h1 class="text-red-500  text-bold">{{$errors}}</h1>
</div>
@endif


    <div class="grid grid-cols-1  lg:grid-cols-2 gap-5  ">
  
        <div class="left justify-self-start w-full  self-center ">
            <h1 class=" font-semibold mb-3 text-black" >Ringkasan</h1>
            <div class="h-full flex  gap-2 flex-wrap w-full justify-around">
                    <div class="row-left flex gap-2 flex-col justify-around">
                        <div class="card bg-white rounded-xl px-2 py-3">
                                <div class="flex space-x-3 items-center">
                                    <div class="icon bg-dodger-blue-100 px-3 py-2 rounded-xl">
                                        <img class="w-6" src="{{asset('asset/icon/bulk/people.svg')}}" alt="">
                                    </div>
                                    <h1 class="text-neutral-06" >Jumlah Penduduk</h1>
                                </div>
    
                                <div class="flex w-full mt-10 space-x-44 items-center ">
                                    <h1 class="text-3xl font-semibold" >{{$semua['penduduk']}}</h1>
                                    <a href="">show</a>
                                </div>
                                
    
                        </div>
                        <div class="card bg-white rounded-xl px-3 py-5">
                            <div class="flex space-x-3 items-center">
                                <div class="icon bg-dodger-blue-100 px-3 py-2 rounded-xl">
                                    <img class="w-6" src="{{asset('asset/icon/bulk/shop.svg')}}" alt="">
    
                                </div>
                                <h1 class="text-neutral-06" >Jumlah UMKM</h1>
                            </div>
    
                            <div class="flex w-full mt-10 space-x-44 items-center ">
                                <h1 class="text-3xl font-semibold" >{{$semua['umkm']}}</h1>
                                <a href="">show</a>
                            </div>
                            
    
                    </div>
                    </div>
                    <div class="row-right flex flex-col  gap-2 justify-around">
                        <div class="card bg-white rounded-xl px-3 py-5">
                            <div class="flex space-x-3 items-center">
                                <div class="icon bg-dodger-blue-100 px-3 py-2 rounded-xl">
                                    <img  class="w-6" src="{{asset('asset/icon/bulk/messages-3.svg')}}" alt="">
                                </div>
                                <h1 class="text-neutral-06" >Jumlah Pengaduan</h1>
                            </div>
    
                            <div class="flex w-full mt-10 space-x-44 items-center ">
                                <h1 class="text-3xl font-semibold" >{{$semua['laporan']}}</h1>
                                <a href="">show</a>
                            </div>
                            
    
                    </div>
                    <div class="card bg-white rounded-xl px-3 py-5">
                        <div class="flex space-x-3 items-center">
                            <div class="icon bg-dodger-blue-100 px-3 py-2 rounded-xl">
                                <img class="w-6" src="{{asset('asset/icon/bulk/directbox.svg')}}" alt="">
                            </div>
                            <h1 class="text-neutral-06" >Jumlah Permohonan</h1>
                        </div>
    
                        <div class="flex w-full mt-10 space-x-44 items-center ">
                            <h1 class="text-3xl font-semibold" >{{$semua['pengajuan']}}</h1>
                            <a href="">show</a>
                        </div>
                        
    
                </div>
                    </div>
            </div>
        </div>
     
        
<div class="justify-self-center col-span-1 carousel  w-[400px] xl:w-full">
    <h1 class=" font-semibold mb-5 text-black" >Pengumuman</h1>
    <div id="default-carousel" class="relative w-full " data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-[326px]  overflow-hidden rounded-lg ">
             <!-- Item 1 -->
             
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
              <div class="absolute font-main  w-full z-50 h-full">
                <div class=" mx-auto flex flex-col justify-end   max-w-7xl px-2 sm:px-6 lg:px-8 py-14 w-full h-full">
                    <h2 class="text-white text-md " >Sistem Informasi RW 06 - Kalirejo </h2>
                    <h1 class=" text-md  font-bold text-white w-3/4" >Ayo ramaikan buka bersama puasa Ramadhan 1445H di Rumah Pak Sohib, pukul 15.00  </h1>
                   
            </div>
          </div>
          <div class="bg-gradient-to-t from-[#0096FF] opacity-50  to-transparent to-70%   z-40 absolute w-full h-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"></div>
                <img src="{{asset('asset/images/homepage.jpg')}}" class="absolute block  w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
              <div class="absolute font-main  w-full z-50 h-full">
                <div class=" mx-auto flex flex-col justify-end   max-w-7xl px-2 sm:px-6 lg:px-8 py-14 w-full h-full">
                    <h2 class="text-white text-md " >Sistem Informasi RW 06 - Kalirejo </h2>
                    <h1 class=" text-md  font-bold text-white w-3/4" >Ayo ramaikan buka bersama puasa Ramadhan 1445H di Rumah Pak Sohib, pukul 15.00  </h1>
                   
            </div>
          </div>
          <div class="bg-gradient-to-t from-[#0096FF] opacity-50  to-transparent to-70%   z-40 absolute w-full h-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"></div>
                <img src="{{asset('asset/images/homepage.jpg')}}" class="absolute block  w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
              <div class="absolute font-main  w-full z-50 h-full">
                <div class=" mx-auto flex flex-col justify-end   max-w-7xl px-2 sm:px-6 lg:px-8 py-14 w-full h-full">
                    <h2 class="text-white text-md " >Sistem Informasi RW 06 - Kalirejo </h2>
                    <h1 class=" text-md  font-bold text-white w-3/4" >Ayo ramaikan buka bersama puasa Ramadhan 1445H di Rumah Pak Sohib, pukul 15.00  </h1>
                   
            </div>
          </div>
          <div class="bg-gradient-to-t from-[#0096FF] opacity-50  to-transparent to-70%   z-40 absolute w-full h-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"></div>
                <img src="{{asset('asset/images/homepage.jpg')}}" class="absolute block  w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
              <div class="absolute font-main  w-full z-50 h-full">
                <div class=" mx-auto flex flex-col justify-end   max-w-7xl px-2 sm:px-6 lg:px-8 py-14 w-full h-full">
                    <h2 class="text-white text-md " >Sistem Informasi RW 06 - Kalirejo </h2>
                    <h1 class=" text-md  font-bold text-white w-3/4" >Ayo ramaikan buka bersama puasa Ramadhan 1445H di Rumah Pak Sohib, pukul 15.00  </h1>
                   
            </div>
          </div>
          <div class="bg-gradient-to-t from-[#0096FF] opacity-50  to-transparent to-70%   z-40 absolute w-full h-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"></div>
                <img src="{{asset('asset/images/homepage.jpg')}}" class="absolute block  w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
              <div class="absolute font-main  w-full z-50 h-full">
                <div class=" mx-auto flex flex-col justify-end   max-w-7xl px-2 sm:px-6 lg:px-8 py-14 w-full h-full">
                    <h2 class="text-white text-md " >Sistem Informasi RW 06 - Kalirejo </h2>
                    <h1 class=" text-md  font-bold text-white w-3/4" >Ayo ramaikan buka bersama puasa Ramadhan 1445H di Rumah Pak Sohib, pukul 15.00  </h1>
                   
            </div>
          </div>
          <div class="bg-gradient-to-t from-[#0096FF] opacity-50  to-transparent to-70%   z-40 absolute w-full h-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"></div>
                <img src="{{asset('asset/images/homepage.jpg')}}" class="absolute block  w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
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

<div class="mt-5">
  <h1 class=" font-semibold mb-5 text-black" >Jumlah Penduduk</h1>
  <div class=" w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
 
  
    <div id="column-chart">
      <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
        <div class="flex justify-between items-center pt-5">
          <!-- Button -->
         
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
          
        </div>
      </div>
  </div>
  </div>
  
</div>
<div class=" mt-5 ">


  <h1 class=" font-semibold mb-5 text-black" >Kas</h1>
  <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800">
    <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
     
      
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
      
        
      </div>
    </div>
  </div>

  


 
  
    </div>

    






    </div>



@endsection

@push('js')
<script>
var data1 = JSON.parse("{{ json_encode($data) }}");
data1.push(0);
var penduduk = "{{ $penduduk_laki }}"
var penduduk1 = "{{ $penduduk_perempuan }}"
var tgl = "{{ json_encode($tgl) }}"
tgl=tgl.replace(/&quot;/g,'"');
penduduk=penduduk.replace(/&quot;/g,'"');
penduduk1=penduduk1.replace(/&quot;/g,'"');
console.log(JSON.parse(penduduk));
// tgl=tgl.replace(,'');

// console.log( JSON.parse(tgl))

// start graph cart
const options = {
// set the labels option to true to show the labels on the X and Y axis
xaxis: {
  show: true,
  categories:JSON.parse(tgl),
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
      return 'Rp.' + value;
    }
  }
},
series: [
  {
    name: "Pemasukan",
    data: data1,
    color: "#1A56DB",
  }
 
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
  show: true,
},
}

// end graph cart
// bar chart

const options1 = {
  colors: ["#1A56DB", "#FDBA8C"],
  series: [
    {
      name: "Laki-laki",
      color: "#55B9FF",
      data:JSON.parse(penduduk),
    },
    {
      name: "Perempuan",
      color: "#AADCFF",
      data: JSON.parse(penduduk1),
        
    },
  ],
  chart: {
    
    type: "bar",
    height: "320px",
    fontFamily: "Inter, sans-serif",
    toolbar: {
      show: false,
    },
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: "70%",
      borderRadiusApplication: "end",
      borderRadius: 8,
    },
  },
  tooltip: {
    shared: true,
    intersect: false,
    style: {
      fontFamily: "Inter, sans-serif",
    },
  },
  states: {
    hover: {
      filter: {
        type: "darken",
        value: 1,
      },
    },
  },
  stroke: {
    show: true,
    width: 0,
    colors: ["transparent"],
  },
  grid: {
    show: true,
    strokeDashArray: 4,
    padding: {
      left: 2,
      right: 2,
      top: -20
    },
  },
  dataLabels: {
    enabled: false,
  },
  legend: {
    show: false,
  },
  xaxis: {
    floating: false,
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
  },
  fill: {
    opacity: 1,
  },
}

if(document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
  const chart = new ApexCharts(document.getElementById("column-chart"), options1);
  chart.render();
}



if (document.getElementById("labels-chart") && typeof ApexCharts !== 'undefined') {
const chart = new ApexCharts(document.getElementById("labels-chart"), options);
chart.render();
}


</script>
@endpush