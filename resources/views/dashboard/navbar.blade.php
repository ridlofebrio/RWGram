@php($i = [1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'])
@php($num = date('N', strtotime(now())))

<div class="h-[100px] bg-white w-full px-5">
    <div class="flex ml-64 items-center h-full justify-between">
        <div>
            <h1 class=" text-sm font-semibold text-neutral-07">{{ $i[$num] }}
                {{ date(', d F Y', strtotime(now())) }}</h1>
            <h1 class="font-semibold text-neutral-10 text-2xl">@yield('pageTitle')</h1>
        </div>

        <div class="flex gap-5 justify-end items-center h-full">

            <button data-drawer-target="separator-sidebar" data-drawer-toggle="separator-sidebar"
                aria-controls="separator-sidebar" type="button"
                class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                    </path>
                </svg>
            </button>
            <button class="notif  bg-neutral-03 hover:bg-blue-main hover:text-white px-3 py-2 rounded-full">
                <i class="fa-regular fa-bell"></i>
            </button>
            <div class="user flex gap-3 items-center">
                <img src="{{ asset('asset/images/profil.jpeg') }}" class="w-9 rounded-full" alt="">
                <div class="info flex justify-center items-center gap-3">
                    <div class="detail">
                        <h1 class="font-body font-medium text-lg">{{ Auth::user()->nama_user }}</h1>
                        <h2 class="font-body font-medium text-xs text-neutral-400">
                            {{ Auth::user()->role_id == 1 ? 'RW Admin' : 'RT Admin' }}</h2>
                    </div>

                    <div x-data="{ open: false }">
                        <button @click="open = ! open" class="hover:bg-blue-main">
                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        </button>
                        <div class="bg-blue-main z-30 absolute top-16 px-3 py-5 right-5 rounded-lg" x-show="open"
                            @click.outside="open = false">

                            <ul>
                                <li><a href="">Setting</a></li>
                                <hr>
                                <li><a href="/logout">Log out</a></li>
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>

</div>
