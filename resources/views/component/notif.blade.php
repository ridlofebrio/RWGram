<div class="bg-white absolute w-[200px] p-3 z-50  right-0 drop-shadow-card rounded-xl top-0 ">
    <h1  >{{count($data) }} laporan Belum Dilihat</h1>
    <hr class="mb-3">

    @if(count($data)==0)
        <h1>Tidak Ada Laporan Baru</h1>
    @endif
   
  @foreach ($data as $item)
     <ul>
        <li class="mb-3 hover:bg-blue-main hover:text-white p-2 rounded-lg">
            <a href="" class="hover:bg-blue-main    w-full">
                <div class="card  flex flex-col">
                    <h1>{{$item->penduduk->nama_penduduk}}</h1>
                    <hr>
                    <h1>{{$item->nama_umkm}}</h1>
                </div>
              </a>
        </li>
     </ul>
  @endforeach



</div>