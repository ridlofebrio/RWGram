<nav class="bg-white py-2 border-b relative z-50 drop-shadow-md">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 right-0 flex items-center lg:hidden">
                <!-- Mobile menu button-->
                <button id="mobile-button" type="button"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-neutral-01 bg-dodger-blue-700 hover:bg-dodger-blue-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!--
              Icon when menu is closed.

              Menu open: "hidden", Menu closed: "block"
            -->
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!--
              Icon when menu is open.

              Menu open: "block", Menu closed: "hidden"
            -->
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex  flex-1 items-center justify-between sm:items-stretch ">
                <div class="flex flex-shrink-0 space-x-3 items-center">
                    <img class="h-10 w-auto" src="{{ asset('asset/images/logo/logo.png') }}" alt="Your Company">
                    <a href="/" class="text-dodger-blue-950 font-body font-bold text-xl "> <span
                            class="text-dodger-blue-700">RW</span>GRAM</a>
                </div>
                <div class="hidden lg:block">
                    <div class="flex items-center gap-8 font-main ">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="/"
                            class="{{ $activeMenu == 'beranda' ? 'text-blue-main' : 'text-neutral-10' }} hover:text-blue-main  rounded-md  text-base font-medium">Beranda</a>
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class=" {{ $activeMenu == 'permohonan' ? 'text-blue-main' : 'text-neutral-10' }} hover:text-blue-main rounded-md  text-base font-medium"
                            aria-current="page">Permohonan <i class="fa fa-angle-down"></i></button>
                        <a href="/pengaduan"
                            class="{{ $activeMenu == 'pengaduan' ? 'text-blue-main' : 'text-neutral-10' }} hover:text-blue-main  rounded-md  text-base font-medium">Pengaduan</a>
                        <a href="/informasi-penduduk/index"
                            class="{{ $activeMenu == 'pengumuman' ? 'text-blue-main' : 'text-neutral-10' }} hover:text-blue-main  rounded-md  text-base font-medium">Pengumuman
                        </a>
                        <a href="/data-penduduk/request"
                            class="{{ $activeMenu == 'dataDiri' ? 'text-blue-main' : 'text-neutral-10' }} hover:text-blue-main  rounded-md  text-base font-medium">Data
                            Diri</a>
                        <a href="{{ $activeMenu == 'beranda' ? '#tentang' : '/#tentang' }}"
                            class="{{ $activeMenu == 'tentang' ? 'text-blue-main' : 'text-neutral-10' }} hover:text-blue-main  rounded-md  text-base font-medium">Tentang</a>
                        <a href="/login"
                            class="text-neutral-01 bg-blue-main hover:bg-dodger-blue-800   px-8 py-3 text-base font-semibold rounded-full drop-shadow-button ">Masuk</a>
                    </div>
                </div>

                <div id="dropdown"
                    class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg w-44 dark:bg-gray-700 drop-shadow-card ">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="/umkm-penduduk/index"
                                class="block px-4 py-2 hover:text-blue-main dark:hover:bg-gray-600 dark:hover:text-white">UMKM</a>
                        </li>
                        <li>
                            <a href="{{ route('nikah.penduduk.index') }}"
                                class="block px-4 py-2 hover:text-blue-main dark:hover:bg-gray-600 dark:hover:text-white">Status
                                Nikah</a>
                        </li>
                        <li>
                            <a href="{{ route('tinggal.penduduk.index') }}"
                                class="block px-4 py-2 hover:text-blue-main dark:hover:bg-gray-600 dark:hover:text-white">Status
                                Tempat Tinggal</a>
                        </li>
                        <li>
                            <a href="{{ route('hidup.penduduk.index') }}"
                                class="block px-4 py-2 hover:text-blue-main dark:hover:bg-gray-600 dark:hover:text-white">Status
                                Meniggal</a>
                        </li>
                        <li>
                            <a href="{{ route('bansos.penduduk.request') }}"
                                class="block px-4 py-2 hover:text-blue-main dark:hover:bg-gray-600 dark:hover:text-white">Bantuan
                                Sosial</a>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View notifications</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
            </svg>
          </button>

           Profile dropdown
          <div class="relative ml-3">
            <div>
              <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">Open user menu</span>
                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
              </button>
            </div>


              Dropdown menu, show/hide based on menu state.

              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"

            {{-- <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
              <!-- Active: "bg-gray-100", Not Active: "" -->
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
            </div> --}}
          </div>
        </div> -->
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="hidden" data-open="false" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#" class=" text-blue-main block rounded-md px-3 py-2 text-base font-medium"
                aria-current="page">Dashboard</a>
            <a href="#"
                class="text-neutral-10  hover:text-blue-main block rounded-md px-3 py-2 text-base font-medium">Team</a>
            <a href="#"
                class="text-neutral-10  hover:text-blue-main block rounded-md px-3 py-2 text-base font-medium">Projects</a>
            <a href="#"
                class="text-neutral-10  hover:text-blue-main block rounded-md px-3 py-2 text-base font-medium">Calendar</a>
        </div>
    </div>
</nav>






<script src="{{ asset('script.js') }}"></script>
