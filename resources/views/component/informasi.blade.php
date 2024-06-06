@foreach ($pengumuman as $item)
<div class="flex w-full gap-3 mt-5">
    <div class=" flex  flex-col">
      <label for="">Pilih</label>
     <div class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
      <input readonly class=" border border-gray-900 rounded-lg w-full  focus:ring-primary-600 focus:border-primary-600 block  p-2.5 "  type="checkbox" name='cek[]' value="{{$item->informasi_id}}" id="">
     </div>
    </div>
    <div class=" flex flex-grow flex-col">
      <label for="">Judul</label>
      <input readonly value="{{$item->judul}}" readonly class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  name="{{$item->judul}}[]" id="">
    </div>
    <div class=" flex flex-grow flex-col">
        <label for="">Deskripsi</label>
        <input readonly value="{{$item->deskripsi_informasi}}" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  name="{{$item->judul}}[]" id="">
      </div>
 
   
  </div>

@endforeach