@extends('dashboard.template')

@section('content')




<div class="text-sm px-5 overflow-x-hidden  py-5 font-medium text-center rounded-xl w-full bg-white  text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul x-data="{active: 'umkm'}" class="flex overflow-x-auto pb-3 -mb-px">
            <li class="">
                <button   @click="active = 'umkm'"  :class="active=='umkm' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 focus:text-blue-main focus:border-blue-main hover:border-gray-300 dark:hover:text-gray-300 w-[120px':'tab inline-block w-[120px] p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"   data="umkm" >UMKM</button>
            </li>
            <li class="">
                <button @click="active = 'nikah'"  data="nikah"  :class="active=='nikah' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 focus:text-blue-main focus:border-blue-main hover:border-gray-300 dark:hover:text-gray-300 w-[120px]':'tab w-[120px] inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"  data="umkm" aria-current="page">Status Nikah</button>
            </li>
            <li class="">
                <button @click="active = 'tinggal'"  data="tinggal" :class="active=='tinggal' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg hover:text-gray-600 focus:text-blue-main focus:border-blue-main hover:border-gray-300 dark:hover:text-gray-300 w-[180px]':'tab w-[180px] inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"  data="umkm">Status Tempat Tinggal</button>
            </l px-3i>
            <li class="">
                <button @click="active = 'meninggal'"  data="meninggal"  :class="active=='meninggal' ?'tab text-blue-main border-b-2 border-blue-main  inline-block p-4 rounded-t-lg focus:text-blue-main focus:border-blue-main hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 w-[150px]':'tab w-[150px] inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"  data="umkm">Status Meninggal</button>
            </li>
           

        </ul>

    <div class="flex flex-wrap w-full mt-5 justify-between items-center">
        <h1>2 Permohonan</h1>
        <div class="filter flex space-x-2">
               
            <div x-data="{open:false}" class="relative " >
                <button @click="open= !open" class=" px-3 hover:bg-blue-main hover:border-blue-main hover:text-white items-center py-2 w-fit  md:min-w-fit md:w-full h-full  border border-gray-300 rounded-full" ><div class="flex min-w-fit md:min-w-[100px] justify-around items-center"><i class=" fa-solid fa-sliders"></i> <p class="hidden md:block" id="sort">-semua-</p> <i class="hidden md:block fa fa-chevron-down"></i></div></button>
                <div class="absolute mt-1 left-1/2 -translate-1/2 p-0 z-30 bg-white drop-shadow-card w-[200px] md:w-full" x-show="open" @click.outside="open=false" >
                   <ul>
                    <li><button  @click="open= !open"  class="hover:bg-blue-main px-5 py-2 w-full sort" data="diterima"   >selesai</button></li>
                    <li><button  @click="open= !open"  class="hover:bg-blue-main px-5 py-2 w-full sort " data="ditolak"  >ditolak</button></li>
                    <li><button @click="open= !open"   class="hover:bg-blue-main px-5 py-2 w-full sort"  data="menunggu"  >menunggu</button></li>
                    
                   </ul>
                </div>
            </div>
          
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input name="search" data="umkm" id="search" value="{{ request('search') }}" class="pl-8 block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari pengaduan" required />
            </div>
        </div>
    </div>        
   
<div  class="relative  mt-5 overflow-x-auto shadow-md sm:rounded-lg ">
    <table id="umkm" class="w-full text-sm text-left rtl:text-right  text-gray-500 dark:text-gray-400">
   
    </table>
    </div>
    <div class="page"></div>
</div>

    </div>
    
  
 
@endsection

@push('js')
    <script>
        // let button = document.querySelectorAll('.tab');
        // console.log(button)

    


            $(document).ready(function(){
                
                $.ajax({
                        url: "{{url('data/umkm')}}",
                        beforeSend: function() {
              $("#loading-image").show();
           },
                        
                    }).done(function (data) {
                                      
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(data, 'text/html');    
                        const table = doc.getElementById('umkm');
                        const page =doc.querySelector('.Page');
                        
                           $('#umkm').html(table);
                           $('.page').html(page);
                          $("#loading-image").hide();
                        
                    })
                 
                    
                $('.tab').click(function(index){
                    
                    $.ajax({
                        url: "{{url('data')}}"+'/'+index.currentTarget.getAttribute('data'),
                        beforeSend: function() {
              $("#loading-image").show();
           },
                        
                    }).done(function (data) {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(data, 'text/html');    
                        const table = doc.getElementById('umkm');
                        const page =doc.querySelector('.page');
                        document.getElementById('search').setAttribute('data',index.currentTarget.getAttribute('data'))
                           $('#umkm').html(table);
                           $('.page').html(page);
                        $("#loading-image").hide();
                       
                    })
                    
                    
                })

                $('#search').keyup(function () {
                    let data = ($(this).val())
                    if(data == null || data == ""){
                        data='kosong';
                    }
                    console.log(data);
                    
                  
                    $.ajax({
                        url: "{{url('search')}}"+'/'+document.querySelector('#search').getAttribute('data')+'/'+data,
                        async:true,
                            
                    }).done(function (data) {    
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(data, 'text/html');    
                        const table = doc.getElementById('umkm');
                        const page =doc.querySelector('.page');
                           $('#umkm').html(table);
                           $('.page').html(page);
                        $("#loading-image").hide();
                    })

                })

                $('.sort').click(function (index) {
                   
                    $.ajax({
                        url: "{{url('data')}}"+'/'+ document.getElementById('search').getAttribute('data')+'/'+index.currentTarget.getAttribute('data'),
                        method:"GET",     beforeSend: function() {
              $("#loading-image").show();
           },
                        success: function (data) {
                            
                            const parser = new DOMParser();
                        const doc = parser.parseFromString(data, 'text/html');    
                        const table = doc.getElementById('umkm');
                        const page =doc.querySelector('.page');
                           $('#umkm').html(table);
                           $('.page').html(page);
                           $('#sort').html(index.currentTarget.getAttribute('data'));
                           $("#loading-image").hide();
                        }
                        
                    })
                })

               
               
                
            })

            function page(event,link) {
               
        event.preventDefault()
        $.ajax({
                        url: link,
                        beforeSend: function() {
              $("#loading-image").show();
           },
           success:function(data){
            const parser = new DOMParser();
                        const doc = parser.parseFromString(data, 'text/html');    
                        const table = doc.getElementById('umkm');
                        const page =doc.querySelector('.page');
                           $('#umkm').html(table);
                           $('.page').html(page);
                        $("#loading-image").hide();
           }
                        
                    })
       } 
    </script>
@endpush