
<style>
    
/* width */
.scrollbar-sangar::-webkit-scrollbar {
  width: 7px;
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

<div class="scrollbar-sangar bg-white absolute   w-[270px] md:w-[500px] p-3 z-50 overflow-y-auto h-fit min-h-[100px] max-h-[500px] -right-48 md:right-0  drop-shadow-card rounded-xl top-2 ">
  
    

    @if($jumlah==0)
        <h1>Tidak Ada Laporan Baru</h1>
        
    @else
    <h1 class="text-black font-bold" >{{$jumlah }} laporan Belum Dilihat</h1>
    @endif
   
    <hr class="mb-3 mt-3">
  @foreach ($umkm as $item)
     <ul>
        <li class="mb-3 hover:bg-blue-main hover:text-white p-2 rounded-lg">
            <a href="{{url('dashboard/pengajuan')}}" class="hover:bg-blue-main    w-full">
                <div class="card  flex items-center space-x-3 ">
                    <div class="w-2 h-2 bg-blue-main rounded-full"></div>
                    <h1 class="font-bold">Permintaan UMKM : </h1>
                   <div class="flex ">
                    <h1>{{$item->penduduk->nama_penduduk}}  -- </h1>
                   
                    <h1>{{$item->nama_umkm}}</h1>
                   </div>
                </div>
              </a>
              <hr class="mt-3">
        </li>
     </ul>
  @endforeach

  
  @foreach ($hidup as $item)
  <ul>
     <li class="mb-3 hover:bg-blue-main hover:text-white p-2 rounded-lg">
         <a href="{{url('dashboard/pengajuan')}}" class="hover:bg-blue-main    w-full">
             <div class="card  flex items-center space-x-3 ">
                <div class="w-2 h-2 bg-blue-main rounded-full"></div>
                    <h1 class="font-bold">Pengajuan Status Hidup : </h1>
                 <h1>{{$item->penduduk->nama_penduduk}}</h1>
                 
                 
             </div>
           </a>
           <hr class="mt-3">
     </li>
  </ul>
@endforeach

@foreach ($nikah as $item)
<ul>
   <li class="mb-3 hover:bg-blue-main hover:text-white p-2 rounded-lg">
       <a href="{{url('dashboard/pengajuan')}}" class="hover:bg-blue-main    w-full">
        <div class="card  flex items-center space-x-3 ">
            <div class="w-2 h-2 bg-blue-main rounded-full"></div>
                <h1 class="font-bold">Pengajuan Status Nikah : </h1>
               <h1>{{$item->penduduk->nama_penduduk}}</h1>
             
             
           </div>
         </a>
         <hr class="mt-3">
   </li>
</ul>
@endforeach

@foreach ($tinggal as $item)
<ul>
   <li class="mb-3 hover:bg-blue-main hover:text-white p-2 rounded-lg">
       <a href="{{url('dashboard/pengajuan')}}" class="hover:bg-blue-main    w-full">
        <div class="card  flex items-center space-x-3 ">
            <div class="w-2 h-2 bg-blue-main rounded-full"></div>
                <h1 class="font-bold">Pengajuan Status Tinggal : </h1>
               <h1>{{$item->penduduk->nama_penduduk}}</h1>
               
     
           </div>
         </a>
         <hr class="mt-3">
   </li>
</ul>
@endforeach


@foreach ($laporan as $item)
<ul>
   <li class="mb-3 hover:bg-blue-main hover:text-white p-2 rounded-lg">
       <a href="{{url('dashboard/pengaduan')}}" class="hover:bg-blue-main    w-full">
        <div class="card  flex items-center space-x-3 ">
            <div class="w-2 h-2 bg-blue-main rounded-full"></div>
                <h1 class="font-bold">Pengaduan : </h1>
               <h1>{{$item->penduduk->nama_penduduk}}</h1>
               
              
           </div>
         </a>
         <hr class="mt-3">
   </li>
</ul>
@endforeach



</div>