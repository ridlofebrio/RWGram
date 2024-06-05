@extends('dashboard.template')

@push('css')
<style>

</style>

@endpush

@section('content')
@if ( Session::has('errors'))
<div class="absolute bg-white drop-shadow-card top-0 left-1/2 -translate-x-1/2">
    <h1 class="text-red-500  text-bold">{{$errors}}</h1>
</div>
@endif


    <div class="grid grid-cols-1 xl:grid-cols-2 gap-10  ">
  
        <div class=" h-full w-full   ">
            <h1 class=" font-semibold mb-3 text-2xl text-black" >Ringkasan</h1>
            <div class="h-full overflow-y-auto flex  gap-2 flex-wrap lg:flex-nowrap w-full items-stretch justify-between">
                    <div class="row-left flex-grow w-full md:w-1/2 flex gap-2 flex-col justify-around">
                        <div class="card bg-white rounded-xl px-3 py-3">
                                <div class="flex space-x-3 items-center">
                                    <div class="icon bg-dodger-blue-100 px-3 py-5 rounded-xl">
                                        <img class="w-6" src="{{asset('asset/icon/bulk/people.svg')}}" alt="">
                                    </div>
                                    <h1 class="text-neutral-06" >Jumlah Penduduk</h1>
                                </div>
    
                                <div class="flex w-full mt-10 justify-between  items-center ">
                                    <h1 class="text-3xl font-semibold" >{{$semua['penduduk']}}</h1>
                                    <a href="">show</a>
                                </div>
                                
    
                        </div>
                        <div class="card bg-white  rounded-xl px-3 py-3">
                            <div class="flex space-x-3 items-center">
                                <div class="icon bg-dodger-blue-100 px-3 py-5 rounded-xl">
                                    <img class="w-6" src="{{asset('asset/icon/bulk/shop.svg')}}" alt="">
    
                                </div>
                                <h1 class="text-neutral-06" >Jumlah UMKM</h1>
                            </div>
    
                            <div class="flex w-full mt-10 justify-between  items-center">
                                <h1 class="text-3xl font-semibold" >{{$semua['umkm']}}</h1>
                                <a href="">show</a>
                            </div>
                            
    
                    </div>
                    </div>
                    <div class="row-left flex-grow w-full md:w-1/2 flex gap-2 flex-col justify-around">
                      <div class="card bg-white rounded-xl px-3 py-3">
                        <div class="flex space-x-3 items-center">
                            <div class="icon bg-dodger-blue-100 px-3 py-5 rounded-xl">
                                <img class="w-6" src="{{asset('asset/icon/bulk/people.svg')}}" alt="">
                            </div>
                            <h1 class="text-neutral-06" >Jumlah Pengaduan</h1>
                        </div>

                        <div class="flex w-full mt-10 justify-between  items-center">
                            <h1 class="text-3xl font-semibold" >{{$semua['laporan']}}</h1>
                            <a href="">show</a>
                        </div>
                        

                </div>
                <div class="card bg-white  rounded-xl px-3 py-3">
                    <div class="flex space-x-3 items-center">
                        <div class="icon bg-dodger-blue-100 px-3 py-5 rounded-xl">
                            <img class="w-6" src="{{asset('asset/icon/bulk/shop.svg')}}" alt="">

                        </div>
                        <h1 class="text-neutral-06" >Jumlah Permohonan</h1>
                    </div>

                    <div class="flex w-full mt-10 justify-between  items-center">
                        <h1 class="text-3xl font-semibold" >{{$semua['pengajuan']}}</h1>
                        <a href="">show</a>
                    </div>
                    

            </div>
                    </div>
            </div>
        </div>
     
        
        <div class="justify-self-center py-5 h-[400px] md:min-h-full col-span-1 carousel w-full  xl:w-full">
          <h1 class=" font-semibold mb-5  text-2xl text-black" >Pengumuman</h1>
          <div id="default-carousel" class="relative h-full w-full " data-carousel="slide">
              <!-- Carousel wrapper -->
              <div class="relative h-full  overflow-hidden rounded-lg ">
            @foreach ($informasi as $item)
              <!-- Item 1 -->
              
             <div class="hidden h-full duration-700 ease-in-out" data-carousel-item>
               <div class="absolute font-main  w-full z-50 h-full">
                 <div class=" mx-auto flex flex-col justify-end   max-w-7xl px-2 sm:px-6 lg:px-8 py-14 w-full h-full">
                     <h2 class="text-white text-md " >Sistem Informasi RW 06 - Kalirejo </h2>
               
                     <h1 class=" text-md block font-bold text-white w-3/4" >{{$item->judul}} </h1>
                     
                    
             </div>
           </div>
           <div class="bg-gradient-to-t from-[#0096FF] opacity-50  to-transparent to-70%   z-40 absolute w-full h-full  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"></div>
                 <img src="{{$item->foto_informasi == null ? 'https://res.cloudinary.com/dtzlizlrs/image/upload/v1716897949/e7dulpy8h3y86sspr8o5.jpg' : $item->foto_informasi}}" class="absolute block  w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
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


{{-- Jumlah Penduduk --}}
<div class=" ">
  <h1 class=" font-semibold mb-5 text-black  text-2xl" >Jumlah Penduduk</h1>
  <div class=" w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
    <div class="mb-3 w-full flex gap-5 justify-end">
      <div class="flex gap-1 flex-col">
       <div class="flex  items-center w-full justify-between ">
        <p>Laki-laki</p>
        <div class="p-2 h-1 rounded-sm ml-2 bg-[#55B9FF]"></div>
       </div>
       <div class="flex items-center  w-full justify-between">
        <p>Perempuan</p>
       <div class="p-2 h-1 rounded-sm ml-2 bg-[#AADCFF]"></div>
       </div>
      </div>
      <select class="ml-5  rounded-full border text-sm font-bold border-neutral-06 text-black" name="" id="">
        <option value="Februari">Februari</option>
        <option value="Februari">Februari</option>
        <option value="Februari">Februari</option>
        <option value="Februari">Februari</option>
        <option value="Februari">Februari</option>
      </select>
    </div>
    
    <div id="column-chart">
    
  </div>
  </div>
  
</div>
{{-- kas --}}
<div class="">


  <h1 class=" text-2xl font-semibold mb-5 text-black" >Kas</h1>
  <div class="w-full  bg-white rounded-lg shadow dark:bg-gray-800">

    <div class="flex justify-between flex-wrap p-4 md:p-6 pb-0 md:pb-0">
      <div class="flex w-full flex-wrap justify-between gap-2">
        <div class="flex flex-wrap space-x-2" x-data="{active: 'pemasukan'}">
         <button  @click="active = 'pemasukan'"  data="pemasukan"  class="tab flex items-center justify-center gap-2 border  border-neutral-06 text-neutral-06 py-2 px-3 rounded-full hover:bg-blue-main focus:bg-[#CCEAFF] focus:text-dodger-blue-800 focus:border-dodger-blue-800 focus:outline-none" autofocus> <div class="p-[2px] rounded-full border-2 border-neutral-06  "><div :class="active=='pemasukan' ? 'p-1 rounded-full bg-blue-main':'p-1 rounded-full bg-white'"></div></div>Pemasukan</button>
         <button @click="active = 'pengeluaran'" data="pengeluaran" class="tab flex items-center justify-center gap-2 border border-neutral-06 text-neutral-06 py-2 px-3 rounded-full hover:bg-blue-main focus:bg-[#CCEAFF] focus:text-dodger-blue-800 focus:border-dodger-blue-800 focus:outline-none"> <div class="p-[2px] rounded-full border-2 border-neutral-06 "><div :class="active=='pengeluaran' ? 'p-1 rounded-full bg-blue-main':'p-1 rounded-full bg-white'"></div></div> Pengeluaran</button>
        </div>
         <select class="rounded-full border text-sm font-bold border-neutral-06 text-black" name="" id="">
           <option value="">6 bulan terakhir</option>
           <option value="">6 bulan terakhir</option>
           <option value="">6 bulan terakhir</option>
           <option value="">6 bulan terakhir</option>
           <option value="">6 bulan terakhir</option>
         </select>
       </div>
      
    </div>


    <div id="labels-chart" class="px-2.5"></div>
   
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
// console.log(penduduk)
tgl=tgl.replace(/&quot;/g,'"');
penduduk=penduduk.replace(/&quot;/g,'"');
penduduk1=penduduk1.replace(/&quot;/g,'"');
console.log(penduduk)
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
  height: "400px",
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


$('.tab').click(function(index){
                      console.log('halo');
                      
                       if(index.currentTarget.getAttribute('data') == 'pengeluaran'){
                        $.ajax({
                          url:"{{url('data/chart')}}"+'/'+index.currentTarget.getAttribute('data'),
                          datatype:'json',
                          beforeSend: function() {
              $("#loading-image").show();
           },
                          success:function(data){
                            $("#loading-image").hide();
                            document.getElementById("labels-chart").innerHTML='pengeluaran'
                             options.xaxis.categories = data.tgl
                             data.data.push(0); 
                             console.log(data);
                            options.series[0].data= data.data;

                            if (document.getElementById("labels-chart") && typeof ApexCharts !== 'undefined' ) {
                          console.log('langsung');
                          const chart = new ApexCharts(document.getElementById("labels-chart"), options);
                          chart.render();
                          }
     
                          }
                        })
                       }else{
                        options.xaxis.categories = JSON.parse(tgl)
                             
                            options.series[0].data= data1;
                            document.getElementById("labels-chart").innerHTML='Pemasukan'
                            if (document.getElementById("labels-chart") && typeof ApexCharts !== 'undefined' ) {
                          console.log('langsung');
                          const chart = new ApexCharts(document.getElementById("labels-chart"), options);
                          chart.render();
                          }
                       }
                       
                        


 
 
              
                })

            
                if (document.getElementById("labels-chart") && typeof ApexCharts !== 'undefined' ) {
                          console.log('langsung');
                          document.getElementById("labels-chart").innerHTML='pemasukan'
                          const chart = new ApexCharts(document.getElementById("labels-chart"), options);
                          chart.render();
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
    height: "365px",
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





</script>
@endpush