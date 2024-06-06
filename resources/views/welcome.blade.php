@extends('layouts.template')

@section('content')
<div class="justify-self-center h-[90vh]  col-span-1 carousel w-full  xl:w-full">

    <div id="default-carousel" class="relative h-full w-full " data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-full  overflow-hidden  ">
      @foreach ($informasi as $item)
        <!-- Item 1 -->

       <div class="hidden h-full duration-700 ease-in-out" data-carousel-item>
         <div class="absolute font-main  w-full z-50 h-full">
           <div class=" mx-auto flex flex-col justify-end   max-w-7xl px-2 sm:px-6 lg:px-8 py-14 w-full h-full">
               <h2 class="text-white text-md " >Sistem Informasi RW 06 - Kalirejo </h2>
               <h1 class=" text-md hidden md:flex font-bold text-white w-3/4" >{{$item->deskripsi_informasi}} </h1>
               <h1 class=" text-md block md:hidden font-bold text-white w-3/4" >{{$item->judul}} </h1>


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



    <div class="about mx-auto max-w-7xl py-32 px-2 sm:px-6 lg:px-8 bg-white" id="tentang">
        <div class="flex gap-12 flex-col md:flex-row w-full justify-center items-center h-full">
            <div class="img flex md:w-[300px] w-[200px] lg:w-[550px]  relative h-[350px]">

                <img class="w-56 md:w-64 absolute left-[1rem] top-5 md:top-0 rounded-xl"
                    src="{{ asset('asset/images/kegiatan1.jpeg') }}" alt="">
                <img class="w-56 md:w-64 absolute md:left-[3rem] left-[2rem] bottom-[4rem] md:bottom-[1rem] rounded-xl "
                    src="{{ asset('asset/images/kegiatan2.jpeg') }}" alt="">
                <img class="w-56 md:w-64 absolute md:right-[5rem] top-[5rem] right-[3rem] md:top-[5rem] rounded-xl "
                    src="{{ asset('asset/images/kegiatan4.jpeg') }}" alt="">

            </div>

            <div class="content w-full px-2 md:p-0  md:w-1/2">

                <h1 href="#" class="text-center w-full text-4xl  md:text-left text-dodger-blue-950 font-body font-bold md:text-5xl ">TENTANG <span
                        class=" text-dodger-blue-700">RW</span>GRAM</h1>
                <br><br>

                <p class="text-md w-full text-center md:text-left md:text-xl">RWGram bertujuan untuk mendigitalisasi sistem informasi di RW, memungkinkan akses yang
                    lebih mudah dan efisien terhadap informasi penting, pengumuman, dan administrasi, serta memperkuat
                    interaksi dan kolaborasi antarwarga </p>
            </div>
        </div>
    </div>

    <div class="statis bg-dodger-blue-900">
        <div class="about mx-auto max-w-7xl py-10 px-2 sm:px-6 lg:px-8 ">
            <div class="grid grid-cols-2 gap-5 md:gap-0 md:grid-cols-4  text-white justify-items-center  h-full ">
                <div class="info w-full flex items-center justify-around font-main font-bold">
                    <div>
                        <h2 class="text-dodger-blue-200 text-2xl mb-2">RT 01</h2>
                        <h1 class="text-white font-semibold text-4xl">{{$penduduk[0]}}<span class="ml-2 text-base font-normal">penduduk</span>

                        </h1>
                    </div>

                    <div class="hidden md:block bg-white w-[1px] h-[52px] opacity-60">
                    </div>
                </div>

                <div class="info w-full flex items-center justify-around font-main font-bold">

                    <div>
                        <h2 class="text-dodger-blue-200 text-2xl mb-2">RT 02</h2>
                        <h1 class="text-white font-semibold text-4xl">{{$penduduk[1]}}<span class="ml-2 text-base font-normal">penduduk</span>
                        </h1>
                    </div>

                    <div class="hidden md:block bg-white w-[1px] h-[52px] opacity-60">
                    </div>
                </div>

                <div class="info w-full flex items-center justify-around font-main font-bold">

                   <div>
                    <h2 class="text-dodger-blue-200 text-2xl mb-2">RT 03</h2>
                    <h1 class="text-white font-semibold text-4xl">{{$penduduk[2]}}<span class="ml-2 text-base font-normal">penduduk</span>
                    </h1>
                   </div>
                    <div class="hidden md:block bg-white w-[1px] h-[52px] opacity-60">
                    </div>
                </div>

                <div class="info font-main font-bold">
                    <h2 class="text-dodger-blue-200 text-2xl mb-2">RT 04</h2>
                    <h1 class="text-white font-semibold text-4xl">{{$penduduk[3]}}<span class="ml-2 text-base font-normal">penduduk</span>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="pelayanan bg-white">
        <div class="text-center font-main font-bold my-32" id="pelayanan">
            <h1 class="text-blue-main md:text-3xl text-xl pb-4">Sistem Informasi RW 06</h1>
            <h1 class="text-dodger-blue-950 md:text-5xl text-2xl font-bold">Pelayanan Yang Tersedia</h1>
        </div>

        <div class="flex flex-wrap items-center gap-5 justify-around mb-32 px-10">
            <div class="card">
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img src="{{ asset('asset/icon/bulk/shop.svg') }}" alt="">

                    <h5 class="mb-2 mt-4 text-xl font-bold tracking-tight text-neutral-10 dark:text-white">UMKM</h5>

                    <p class="mb-3 font-normal text-neutral-10 dark:text-gray-400">Anda bisa melakukan pengajuan UMKM untuk memudahkan
                        Anda dalam melakukan promosi dan mengembangkan usaha Anda.</p>
                    <a href="{{ route('umkm.penduduk.index') }}"
                        class="inline-flex gap-2 font-medium items-center text-blue-main group hover:text-dodger-blue-800">
                        Ajukan <i class="fa fa-arrow-right group-hover:translate-x-2 transition ease-out"></i>
                    </a>
                </div>
            </div>
            <div class="card">
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img src="{{ asset('asset/icon/bulk/profile-2user.svg') }}" alt="">

                    <h5 class="mb-2 mt-4 text-xl font-bold tracking-tight text-neutral-10 dark:text-white">Status Nikah</h5>

                    <p class="mb-3 font-normal text-neutral-10 dark:text-gray-400">Anda bisa melakukan pengajuan status pernikahan untuk mengubah status pernikahan Anda.</p>
                    <a href="{{ route('nikah.penduduk.index') }}"
                        class="inline-flex gap-2 font-medium items-center text-blue-main group hover:text-dodger-blue-800">
                        Ajukan <i class="fa fa-arrow-right group-hover:translate-x-2 transition ease-out"></i>
                    </a>
                </div>
            </div>

            <div class="card">
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img src="{{ asset('asset/icon/bulk/house.svg') }}" alt="">

                    <h5 class="mb-2 mt-4 text-xl font-bold tracking-tight text-neutral-10 dark:text-white">Status Tempat Tinggal
                    </h5>

                    <p class="mb-3 font-normal text-neutral-10 dark:text-gray-400">Anda bisa melakukan pengajuan status tempat tinggal untuk mengubah status tinggal Anda.</p>
                    <a href="{{ route('tinggal.penduduk.index') }}"
                        class="inline-flex gap-2 font-medium items-center text-blue-main group hover:text-dodger-blue-800">
                        Ajukan <i class="fa fa-arrow-right group-hover:translate-x-2 transition ease-out"></i>
                    </a>
                </div>
            </div>

            <div class="card">
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img src="{{ asset('asset/icon/bulk/profile-delete.svg') }}" alt="">

                    <h5 class="mb-2 mt-4 text-xl font-bold tracking-tight text-neutral-10 dark:text-white">Status Meninggal</h5>

                    <p class="mb-3 font-normal text-neutral-10 dark:text-gray-400">Anda bisa melakukan pengajuan status meninggal untuk mengubah status kematian seseorang.</p>
                    <a href="{{ route('hidup.penduduk.index') }}"
                        class="inline-flex gap-2 font-medium items-center text-blue-main group hover:text-dodger-blue-800">
                        Ajukan <i class="fa fa-arrow-right group-hover:translate-x-2 transition ease-out"></i>
                    </a>
                </div>
            </div>

            <div class="card">
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img src="{{ asset('asset/icon/bulk/messages-3.svg') }}" alt="">

                    <h5 class="mb-2 mt-4 text-xl font-bold tracking-tight text-neutral-10 dark:text-white">Pengaduan</h5>

                    <p class="mb-3 font-normal text-neutral-10 dark:text-gray-400">Anda bisa melakukan pengaduan untuk membuat laporan kepada RT/RW dan ditindaklanjuti dengan cepat.</p>
                    <a href="{{ route('laporan.penduduk.index') }}"
                        class="inline-flex gap-2 font-medium items-center text-blue-main group hover:text-dodger-blue-800">
                        Ajukan <i class="fa fa-arrow-right group-hover:translate-x-2 transition ease-out"></i>
                    </a>
                </div>
            </div>

            <div class="card">
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img src="{{ asset('asset/icon/bulk/3d-square.svg') }}" alt="">

                    <h5 class="mb-2 mt-4 text-xl font-bold tracking-tight text-neutral-10 dark:text-white">Bantuan Sosial</h5>

                    <p class="mb-3 font-normal text-neutral-10 dark:text-gray-400">Anda bisa melakukan pengajuan bansos untuk mempermudahkan RW dalam memilih warga yang layak mendapatkan bansos.</p>
                    <a href="{{ route('bansos.penduduk.request')}}"
                        class="inline-flex gap-2 font-medium items-center text-blue-main group hover:text-dodger-blue-800">
                        Ajukan <i class="fa fa-arrow-right group-hover:translate-x-2 transition ease-out"></i>
                    </a>
                </div>
            </div>

            <div class="card">
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img src="{{ asset('asset/icon/bulk/message.svg') }}" alt="">

                    <h5 class="mb-2 mt-4 text-xl font-bold tracking-tight text-neutral-10 dark:text-white">Pengumuman</h5>

                    <p class="mb-3 font-normal text-neutral-10 dark:text-gray-400">Anda bisa melihat pengumuman yang tersedia untuk membantu Anda tetap terhubung dengan informasi terbaru.</p>
                    <a href="{{ route('informasi.penduduk.index') }}"
                        class="inline-flex gap-2 font-medium items-center text-blue-main group hover:text-dodger-blue-800">
                        Ajukan <i class="fa fa-arrow-right group-hover:translate-x-2 transition ease-out"></i>
                    </a>
                </div>
            </div>

            <div class="card">
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img src="{{ asset('asset/icon/bulk/profile-circle.svg') }}" alt="">

                    <h5 class="mb-2 mt-4 text-xl font-bold tracking-tight text-neutral-10 dark:text-white">Melihat Data Diri</h5>

                    <p class="mb-3 font-normal text-neutral-10 dark:text-gray-400">Anda bisa melihat data diri anda untuk mengetahui informasi pribadi Anda, seperti nama, alamat , dll.</p>
                    <a href="{{ route('data.penduduk.request') }}"
                        class="inline-flex gap-2 font-medium items-center text-blue-main group hover:text-dodger-blue-800">
                        Ajukan <i class="fa fa-arrow-right group-hover:translate-x-2 transition ease-out"></i>
                    </a>
                </div>
            </div>




        </div>

        <div class="logo mb-32">
            <div class="flex flex-shrink-0 flex-col  gap-10 items-center">
                <img class="h-16 md:h-32 w-auto" src="{{ asset('asset/icon/logo.svg') }}" alt="Your Company">
                <a href="#" class="text-dodger-blue-950 font-body font-bold text-3xl  md:text-7xl "> <span
                        class="text-dodger-blue-700">RW</span>GRAM</a>
            </div>
        </div>

@endsection
