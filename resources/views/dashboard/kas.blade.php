@extends('dashboard.template')

@section('content')



<div class="text-sm px-5 overflow-x-auto py-5 font-medium text-center rounded-xl w-full bg-white  text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
       
  <ul x-data="{active: 'pemasukan'}" class="flex overflow-x-auto -mb-px">
    <li class="me-2">
        <button   @click="active = 'pemasukan'"  :class="active=='pemasukan' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300':'tab inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"   data="umkm" >Pemasukan</button>
    </li>
    <li class="me-2">
      <button   @click="active = 'pengeluaran'"  :class="active=='pengeluaran' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300':'tab inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"   data="umkm" >Pengeluaran</button>
  </li>
   

</ul>
<hr>

{{-- chart --}}
  <div class="w-full mt-5 border-2 border-neutral-02 bg-white rounded-lg shadow dark:bg-gray-800">
    <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
     
      
    </div>


    <div id="labels-chart" class="px-2.5"></div>
    
  </div>

   {{-- end chart --}}

   <div  class="relative  mt-5 overflow-x-auto shadow-md sm:rounded-lg ">
    <table id='umkm' class="w-full text-sm text-left rtl:text-right  text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-neutral-03 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  No
              </th>
              <th scope="col" class="px-6 py-3">
                  Sumber
              </th>
              <th scope="col" class="px-6 py-3">
                  Jan
              </th>
              <th scope="col" class="px-6 py-3">
                  Feb
              </th>
              <th scope="col" class="px-6 py-3">
                  Mar
              </th>
              <th scope="col" class="px-6 py-3">
                Apr
            </th>
            <th scope="col" class="px-6 py-3">
              Mei
          </th>
          <th scope="col" class="px-6 py-3">
           Jun
        </th>
        <th scope="col" class="px-6 py-3">
          Jul
          </th>
          <th scope="col" class="px-6 py-3">
        Ags
           </th>
          <th scope="col" class="px-6 py-3">
           Sep
                 </th>
           <th scope="col" class="px-6 py-3">
             Okt
           </th>
           <th scope="col" class="px-6 py-3">
             Nov
           </th>
           <th scope="col" class="px-6 py-3">
             Des
           </th>
                       <th scope="col" class="px-6 py-3">
                          Aksi
              </th>
          </tr>
      </thead>
      <tbody id="body">
          
              @foreach ($kk as $item1)
                @foreach ($kas as $item)
                    @if($item->kartu_keluarga_id == $item1->kartu_keluarga_id)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$loop->index +1 }}
                      </th>
                      <td class="px-6 py-4">
                         {{$item->NKK}}
                      </td>
                     
                      <td scope="col" class="px-6 py-3">
                        
                        {{isset($item->waktu->bulan)   ? $item->waktu->bulan=='Januari'? date('d',strtotime($item->tanggal_kas)):'-' :'-'}}
                    </td>
                    <td scope="col" class="px-6 py-3">
                     {{isset($item->waktu->bulan)   ? $item->waktu->bulan=='Februari'? date('d',strtotime($item->tanggal_kas)):'-' :'-'}}
                    </td>
                    <td scope="col" class="px-6 py-3">
                     {{isset($item->waktu->bulan)   ? $item->waktu->bulan=='Maret'? date('d',strtotime($item->tanggal_kas)):'-' :'-'}}
                    </td>
                    <td scope="col" class="px-6 py-3">
                     {{isset($item->waktu->bulan)   ? $item->waktu->bulan=='April'? date('d',strtotime($item->tanggal_kas)):'-' :'-'}}
                  </td>
                  <td scope="col" class="px-6 py-3">
                   {{isset($item->waktu->bulan)   ? $item->waktu->bulan=='Mei'? date('d',strtotime($item->tanggal_kas)):'-' :'-'}}
                </td>
                <td scope="col" class="px-6 py-3">
                 {{isset($item->waktu->bulan)   ? $item->waktu->bulan=='Juni'? date('d',strtotime($item->tanggal_kas)):'-' :'-'}}
                        </td>
                        <td scope="col" class="px-6 py-3">
                         {{isset($item->waktu->bulan)   ? $item->waktu->bulan=='Juli'? date('d',strtotime($item->tanggal_kas)):'-' :'-'}}
                      </td>
                      <td scope="col" class="px-6 py-3">
                        {{isset($item->waktu->bulan)   ? $item->waktu->bulan=='Agustus'? date('d',strtotime($item->tanggal_kas)):'-' :'-'}}
                    </td>
                    <td scope="col" class="px-6 py-3">
                      {{isset($item->waktu->bulan)   ? $item->waktu->bulan=='September'? date('d',strtotime($item->tanggal_kas)):'-' :'-'}}
                    </td>
                    <td scope="col" class="px-6 py-3">
                     {{isset($item->waktu->bulan)   ? $item->waktu->bulan=='Oktober'? date('d',strtotime($item->tanggal_kas)):'-' :'-'}}
                    </td>
                    <td scope="col" class="px-6 py-3">
                     {{isset($item->waktu->bulan)   ? $item->waktu->bulan=='November'? date('d',strtotime($item->tanggal_kas)):'-' :'-'}}
                    </td>
                    <td scope="col" class="px-6 py-3">
                     {{isset($item->waktu->bulan)   ? $item->waktu->bulan=='Desember'? date('d',strtotime($item->tanggal_kas)):'-' :'-'}}
                    </td>
          
                      <td class="px-6 py-4 flex gap-2 ">
                      tes 
                          
          
                      </td>
                      
                  </tr>
                    @endif
                @endforeach
              @endforeach
            
       
         
      </tbody>
  </table>
    </div>
  


  </div>
    

 
@endsection

@push('js')

<script>
var data1 = JSON.parse("{{ json_encode($data) }}");
data1.push(0);
var tgl = "{{ json_encode($tgl) }}"
tgl=tgl.replace(/&quot;/g,'"');


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
if (document.getElementById("labels-chart") && typeof ApexCharts !== 'undefined') {
const chart = new ApexCharts(document.getElementById("labels-chart"), options);
chart.render();
}
       
</script>

@endpush
