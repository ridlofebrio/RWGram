<table id='umkm' class="w-full text-sm text-left rtl:text-right  text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-neutral-03 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                No
            </th>
            <th scope="col" class="px-6 py-3">
                Tanggal
            </th>
            <th scope="col" class="px-6 py-3">
                Nama
            </th>
            <th scope="col" class="px-6 py-3">
                Nama UMKM
            </th>
            <th scope="col" class="px-6 py-3">
                Status
            </th>
            <th scope="col" class="px-6 py-3">
               Aksi
            </th>
        </tr>
    </thead>
    <tbody id="body">
        
            @foreach ($data as $status)
         <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$status->id_status_nikah}}
            </th>
            <td class="px-6 py-4">
                {{$status->nama_pengaju}}
            </td>
            <td class="px-6 py-4">
                {{$status->nama_pasangan}}
            </td>
            <td class="px-6 py-4">
                {{$status->status}}
            </td>
            <td class="px-6 py-4">
                <div class="px-2 py-2  bg-[#CCF1E5] rounded-full flex items-center gap-2 justify-center">
                        <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                        <p class="font-body font-semibold text-green-400">

                                Selesai

                        </p>
                </div>
            </td>
        
            <td class="px-6 py-4 flex gap-2 ">
                <a href="/login" class="text-red-500 border-2 border-red-500  hover:bg-red-500 hover:text-white   px-8 py-2 text-base font-medium rounded-full  ">Tolak</a>
                <a href="/login" class="text-neutral-01 bg-blue-main hover:bg-dodger-blue-800   px-5 py-2 text-base font-medium rounded-full  ">Konfirmasi</a>
                <a href="/login" class="hover:border-none   text-blue-main bg-dodger-blue-50 hover:bg-dodger-blue-100  px-8 py-2 text-base font-medium rounded-full  ">Detail</a>
            </td>
            
        </tr>
            @endforeach
          
     
       
    </tbody>
</table>