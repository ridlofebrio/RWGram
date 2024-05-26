@foreach ($data as $item)

<div class="flex w-full justify-between mt-5">
    <div class=" flex flex-col">
      <label for="">Pilih</label>
     <div class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
      <input readonly class=" border border-gray-900 rounded-lg   focus:ring-primary-600 focus:border-primary-600 block  p-2.5 "  type="checkbox" name='cek[]' value="januari" id="">
     </div>
    </div>
    <div class=" flex flex-col">
      <label for="">Bulan</label>
      <input readonly value="{{$item->bulan}}" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="januari" name="januari[]" id="">
    </div>
    <div class=" flex flex-col">
      <label for="">Tanggal</label>
      <input readonly value="{{$item->tanggal_kas}}" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="date" name="januari[]" id="">
    </div>
    <div class=" flex flex-col">
      <label for="">Jumlah</label>
      <input value="{{$item->jumlah_kas}}" readonly value="15000" readonly class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" type="number" name="januari[]" id="">
    </div>
  </div>

@endforeach