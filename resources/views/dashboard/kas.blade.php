@extends('dashboard.template')

@section('content')



<div class="text-sm px-5 overflow-x-auto py-5 font-medium text-center rounded-xl w-full bg-white  text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
       
  <ul x-data="{active: 'pemasukan'}" class="flex overflow-x-auto -mb-px">
    <li class="">
        <button   @click="active = 'pemasukan'"  :class="active=='pemasukan' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300':'tab inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"   data="pemasukan" >Pemasukan</button>
    </li>
    <li class="">
      <button   @click="active = 'pengeluaran'"  :class="active=='pengeluaran' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300':'tab inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"   data="pengeluaran" >Pengeluaran</button>
  </li>
   

</ul>
<hr>

{{-- chart --}}
  <div class="w-full mt-5 border-2 h-full max-h-[500px] pb-7 border-neutral-02 bg-white rounded-lg shadow dark:bg-gray-800">
   


    <div id="labels-chart" class="px-2.5"></div>
   

    
  </div>

   {{-- end chart --}}


   <div class="flex mt-3 flex-wrap md:flex-nowrap gap-3 w-full justify-between items-center">
        
        
        
          

    

  <div class="filter flex space-x-2  items-center w-full">
     
    <div class="{{Auth::user()->user_id== 1 ? 'hidden':' relative w-full md:w-1/2 h-full'}}">
      <div class="absolute  inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" strokclass="{{Auth::user()->user_id== 1 ? 'hidden':' relative w-full md:w-1/2 h-full'}}"e-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
          </svg>
      </div>
      <input name="search"  id="search" data="umkm" value="{{ request('search') }}" class="search pl-8 py-3 block w-full  p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari" required />
  </div>
      
  </div>
  <div class="flex gap-2 w-full md:w-1/2 justify-end ">
      <div x-data="{ open: false }" class="w-fit">
          
        <a href="{{url('kas/pdf')}}"  class="flex border-2 px-8 py-2 w-fit  rounded-full   items-center hover:bg-blue-main hover:text-white text-neutral-10 hover:border-blue-main ">

          <i class="fa-solid  fa-up-right-from-square"></i>
            
            <p class="  hidden w-[100px] sm:block md:hidden lg:block font-semibold">Export CSV</p>
        </a>
         <!-- Main modal -->
       
          
      </div>
     
   
      <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="w-full md:w-1/3 text-neutral-01 bg-blue-main hover:bg-dodger-blue-800   px-8 py-2 text-base font-medium rounded-full  " type="button">
          Tambah
        </button>

        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full inset-0 h-[calc(100%-1rem)] max-h-full">
          <div  class="relative p-4 w-full  max-w-[900px] h-[80vh]">
              <!-- Modal content -->
              <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                  <!-- Modal header -->
                  <div class="flex items-center  justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                          Tambah Pengeluaran
                      </h3>
                      <button type="button" class="absolute -top-5 -right-4 bg-blue-main   text-white border-2 border-white hover:bg-gray-200 hover:text-gray-900 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                  </div>
                  <!-- Modal body -->
                  <form action="{{url('/kas/pengeluaran')}}" method="POST" class="p-4 md:p-5 text-left">
                    @csrf
                    @method('POST')
                      <div class="grid gap-4 mb-4 grid-cols-2">
                        <input type="hidden" name="user_id" value="{{Auth::user()->user_id}}">
                          <div class="col-span-2">
                              <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan </label>
                              <input type="text" name="keterangan_kas_log" id="name" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Keterangan" required="">
                          </div>
                          <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                            <input type="number" name="Jumlah" id="name" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Jumlah" required="">
                        </div>
                        </div>
                      <button type="submit" class="text-white inline-flex items-center bg-blue-700 mt-5 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                          <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                          Simpan
                      </button>
                  </form>
              </div>
          </div>
      </div> 
      


     </div>
</div> 

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
          
              @foreach ($kas as $item)
                
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$loop->index +1 }}
                      </th>
                      <td class="px-6 py-4">
                     @if(Auth::user()->user_id == 1)
                     {{$item->user->nama_user}}
                     @else
                         {{$item->kartuKeluarga->penduduk->nama_penduduk}}
                     @endif
                      </td>
                     
                      <td scope="col" class="px-6 py-3">
                        <i class=" fa-solid {{$item->Januari ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i>
                       
                    </td>
                    <td scope="col" class="px-6 py-3">
                      <i class=" fa-solid {{$item->Februari  ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i>
                    </td>
                    <td scope="col" class="px-6 py-3">
                      <i class=" fa-solid {{$item->Maret  ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i> 
                    </td>
                    <td scope="col" class="px-6 py-3">
                      <i class=" fa-solid {{$item->April  ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i>
                  </td>
                  <td scope="col" class="px-6 py-3">
                    <i class=" fa-solid {{$item->Mei  ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i> 
                </td>
                <td scope="col" class="px-6 py-3">
                  <i class=" fa-solid {{$item->Juni  ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i> 
                        </td>
                        <td scope="col" class="px-6 py-3">
                          <i class=" fa-solid {{$item->Juli  ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i> 
                      </td>
                      <td scope="col" class="px-6 py-3">
                        <i class=" fa-solid {{$item->Agustus  ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i> 
                    <td scope="col" class="px-6 py-3">
                      <i class=" fa-solid {{$item->September  ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i>
                    </td>
                    <td scope="col" class="px-6 py-3">
                      <i class=" fa-solid {{$item->Oktober  ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i>                  
                         </td>
                    <td scope="col" class="px-6 py-3">
                      <i class=" fa-solid {{$item->November  ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i>
                    </td>
                    <td scope="col" class="px-6 py-3">
                      <i class=" fa-solid {{$item->Desember  ? 'fa-circle-check text-blue-main text-xl':'fa-minus'}}"></i>
                    </td>
          <td class="flex items-center h-full">
            <div x-cloak x-data="{ open: false }">
              <button  onclick="fetchDetail(event,{{$item->id_kas}})"  @click="open = true"  class="my-2 hover:border-none  before:absolute text-blue-main bg-dodger-blue-50 hover:bg-dodger-blue-100  px-8 py-2 text-base font-medium rounded-full  " type="button">
                  Detail
                </button>
                
                <!-- Main modal -->
                <div  x-show="open"  x-transition tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed  z-40 justify-center items-center w-full inset-0 h-[calc(100%-1rem)] max-h-full">
                
                  <div  class="absolute w-full max-w-[920px] h-[80vh] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2  p-4  z-50 ">
                        <!-- Modal content -->
                        <div @click.outside="open = false" id='modal-{{$item->id_kas}}' class="relative bg-white w-full  rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                  Detail
                                </h3>
                                <button type="button" @click="open = false" class="absolute -top-5 -right-4 bg-blue-main   text-white border-2 border-white hover:bg-gray-200 hover:text-gray-900 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " >
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form action="{{url('/kas')}}" method="POST"  class="p-4 md:p-5 text-left">
                              @csrf
                              @method('POST')
                              <div class="grid gap-4 mb-4 grid-cols-2">
                                @if(Auth::user()->user_id == 1)
                                <div class="col-span-2">
                                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sumber</label>
                                  <input type="text" name="nama_user" id="name" value="{{$item->user->nama_user}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NKK" required="">
                              </div>
                             
                     @else
                     <div class="col-span-2">
                      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NKK</label>
                      <input type="text" name="NKK" id="name" value="{{$item->kartuKeluarga->kartuKeluarga->NKK}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NKK" required="">
                  </div>
                 
                     @endif
                                  
                              </div>
                              <div id="list" >
                           
                              </div>
                              <button type="button" class="block w-full text-center bg-blue-main text-white py-3 hover:bg-dodger-blue-600 mt-5 rounded-xl" onclick="addDetail(event,'modal-{{$item->id_kas}}')">+</button>
                              <button type="submit" class="text-white inline-flex items-center bg-blue-700 mt-5 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                Simpan
                            </button> 
                            
                          </form>
                        
                        </div>
                    </div>
                    <div class="bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40"></div> 
                </div> 
               
          </div>

            <form action="{{url('/kas/'.$item->id_kas)}}" onsubmit="return alert('are You sure ?')" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="hover:border-none  hover:bg-dodger-blue-100  px-8 py-2 text-base font-medium rounded-full  "><svg   xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path  stroke="#EE0B0B" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 5.98c-3.33-.33-6.68-.5-10.02-.5-1.98 0-3.96.1-5.94.3L3 5.98m5.5-1.01.22-1.31C8.88 2.71 9 2 10.69 2h2.62c1.69 0 1.82.75 1.97 1.67l.22 1.3m3.35 4.17-.65 10.07C18.09 20.78 18 22 15.21 22H8.79C6 22 5.91 20.78 5.8 19.21L5.15 9.14m5.18 7.36h3.33m-4.16-4h5"/>
                </svg>
              </button>
          </form>
          </td>
                  
                      
                  </tr>
                 
               
              @endforeach
            
       
         
      </tbody>
  </table>
    </div>
  
    <div class="w-full mt-5 flex justify-end">
      <div class="py-3 pl-3 drop-shadow-button rounded-xl text-left pr-10 border border-neutral-03 bg-white">
        <h1 class="text-md  text-neutral-05">Total Kas</h1>
        <h1 class=" text-2xl font-regular text-black">Rp. {{$jumlah}}</h1>
      </div>
    </div>

  </div>
    


 
@endsection

@push('js')

<script>
// ============= fungsi fetch data ================= //
  const fetchDetail= (event,noKK)=>
  {
    
    $.ajax({
      url:"{{url('kas')}}"+"/"+noKK,
      method:'GET',
      datatype:'json',
      beforeSend: function() {
              $("#loading-image").show();
           },
      success:function(data){
     
        event.target.parentElement.querySelector('#list').innerHTML=data ;         
        //  $('#list').html(data)
        $("#loading-image").hide();
      
      },
      error:function(error){
        console.log(error);
      }
    })
  }

  // ============= end fetch data ================= //

  // change name
    const changeName= (event)=>{
      let target = event.target
      let form =target.parentElement.parentElement;
   
      let check= form.querySelector('#checkbox');
      let tanggal= form.querySelector('#tanggal');
      let jumlah= form.querySelector('#jumlah');
      check.value=target.value;

      tanggal.setAttribute('name',target.value+'[]')
      jumlah.setAttribute('name',target.value+'[]')
 
      target.setAttribute('name',target.value+'[]')
      
    }
  // end change name

// add detail //

const addDetail= (event,idModal)=>{
event.preventDefault()
  let data = `
<div class="flex w-full justify-between mt-5">
    <div class=" flex flex-col">
      <label for="">Pilih</label>
     <div class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
      <input checked id ="checkbox" class=" border border-gray-900 rounded-lg   focus:ring-primary-600 focus:border-primary-600 block  p-2.5 " type="checkbox" name='cek[]' value="Januari" id="">
     </div>
    </div>
    <div class=" flex flex-col">
      <label for="">Bulan</label>
     
      <select name="Januari[]" onchange="changeName(event)" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-[200px] p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" id="">
  <option value="Januari">Januari</option>
  <option value="Februari">Februari</option>
  <option value="Maret">Maret</option>
  <option value="April">April</option>
  <option value="Mei">Mei</option>
  <option value="Juni">Juni</option>
  <option value="Juli">Juli</option>
  <option value="Agustus">Agustus</option>
  <option value="September">September</option>
  <option value="Oktober">Oktober</option>
  <option value="November">November</option>
  <option value="Desember">desember</option>
</select>
    </div>
    <div class=" flex flex-col">
      <label for="">Tanggal</label>
      <input class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="date" name="Januari[]" id="tanggal">
    </div>
    <div class=" flex flex-col">
      <label for="">Jumlah</label>
      <input value="15000" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="number" name="Januari[]" id="jumlah">
    </div>
  </div>
`
const modal=document.getElementById(idModal);
console.log('#'+idModal+' list')
$('#' +idModal+' #list ').append(data);
}

// end //




$(document).ready(function () {

  // VARIABEL


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

                         
  // END 
 



    $('.tab').click(function(index){
                      console.log('halo');
                    $.ajax({
                        url: "{{url('data/')}}"+'/'+index.currentTarget.getAttribute('data'),
                        beforeSend: function() {
                    $("#loading-image").show();
      },
                        
                    }).done(function (data) {
                   
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(data, 'text/html');    
                        const table = doc.querySelector('#umkm');
                      
                        $('#umkm').html(table);
                        $("#loading-image").hide();
                      
                       if(index.currentTarget.getAttribute('data') == 'pengeluaran'){
                        $.ajax({
                          url:"{{url('data/chart')}}"+'/'+index.currentTarget.getAttribute('data'),
                          datatype:'json',
                          success:function(data){
                            document.getElementById("labels-chart").innerHTML=''
                             options.xaxis.categories = data.tgl
                             data.data.push(0);
                            options.series[0].data= data.data;

                            if (document.getElementById("labels-chart") && typeof ApexCharts !== 'undefined' ) {
                          console.log('langsung');
                          const chart = new ApexCharts(document.getElementById("labels-chart"), options);
                          chart.render();
                          }
                          
             

                          // start graph cart
                          
                          
                           
                          
                          }
                        })
                       }else{
                        options.xaxis.categories = JSON.parse(tgl)
                             
                            options.series[0].data= data1;
                            document.getElementById("labels-chart").innerHTML=''
                            if (document.getElementById("labels-chart") && typeof ApexCharts !== 'undefined' ) {
                          console.log('langsung');
                          const chart = new ApexCharts(document.getElementById("labels-chart"), options);
                          chart.render();
                          }
                       }
                       
                        


 })
 
              
                })
                $('#search').change(function () {
                    let data = ($(this).val())
                    if(data == null || data == ""){
                        data='kosong';
                    }
                    console.log(data);
                    
                  
                    $.ajax({
                        url: "{{url('search/kas/')}}"+'/'+data,
                        type: "GET",
                   
                        async:true,
                        
                    }).done(function (data) {    
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(data, 'text/html');    
                        const table = doc.getElementById('umkm');
                            $('#umkm').html(table); 
                    })

                })

                if (document.getElementById("labels-chart") && typeof ApexCharts !== 'undefined' ) {
                          console.log('langsung');
                          document.getElementById("labels-chart").innerHTML=''
                          const chart = new ApexCharts(document.getElementById("labels-chart"), options);
                          chart.render();
                        }
  
    })

   

                         


</script>

@endpush
