@if (Auth::user()->user_id != 2)
    <aside id="separator-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full md:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full flex flex-col justify-between">
            <div
                class="h-full font-body flex flex-col justify-between text-sm px-3 py-10 overflow-y-auto bg-white dark:bg-gray-800">
                <div class="top">
                    <div class="logo">
                        <div class="flex flex-shrink-0 space-x-3 justify-center items-center">
                            <img class="h-10 w-auto"
                                src="https://res.cloudinary.com/dtzlizlrs/image/upload/v1717481970/ioxdtp815fvw1w3smkcc.png"
                                alt="Your Company">
                            <a href="#" class="text-dodger-blue-950 font-body font-bold text-xl "> <span
                                    class="text-dodger-blue-700">RW</span>GRAM</a>
                        </div>
                    </div>
                    <ul class="mt-12 space-y-2 font-medium">
                        <li>
                            <a href="{{ url('dashboard') }}"
                                class="{{ $active == 'beranda' ? 'bg-blue-main hover:bg-blue-main text-white ' : 'hover:bg-gray-100' }}  flex items-center p-2 text-neutral-10 rounded-lg dark:text-white  dark:hover:bg-gray-700 group">
                                @if ($active == 'beranda')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path fill="#fff"
                                            d="m20.04 6.82-5.76-4.03c-1.57-1.1-3.98-1.04-5.49.13L3.78 6.83c-1 .78-1.79 2.38-1.79 3.64v6.9c0 2.55 2.07 4.63 4.62 4.63h10.78c2.55 0 4.62-2.07 4.62-4.62V10.6c0-1.35-.87-3.01-1.97-3.78ZM12.75 18c0 .41-.34.75-.75.75s-.75-.34-.75-.75v-3c0-.41.34-.75.75-.75s.75.34.75.75v3Z" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path fill="#1B1B1B"
                                            d="M17.79 22.75H6.21c-2.74 0-4.96-2.23-4.96-4.97v-7.41c0-1.36.84-3.07 1.92-3.91l5.39-4.2C10.18 1 12.77.94 14.45 2.12l6.18 4.33c1.19.83 2.12 2.61 2.12 4.06v7.28c0 2.73-2.22 4.96-4.96 4.96ZM9.48 3.44l-5.39 4.2c-.71.56-1.34 1.83-1.34 2.73v7.41a3.47 3.47 0 0 0 3.46 3.47h11.58c1.91 0 3.46-1.55 3.46-3.46v-7.28c0-.96-.69-2.29-1.48-2.83l-6.18-4.33c-1.14-.8-3.02-.76-4.11.09Z" />
                                        <path fill="#1B1B1B"
                                            d="M12 18.75c-.41 0-.75-.34-.75-.75v-3c0-.41.34-.75.75-.75s.75.34.75.75v3c0 .41-.34.75-.75.75Z" />
                                    </svg>
                                @endif
                                <span class="ms-3">Beranda</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dashboard/pengajuan') }}"
                                class="flex items-center {{ $active == 'pengajuan' ? 'bg-blue-main hover:bg-blue-main text-white' : 'hover:bg-gray-100' }}  p-2 text-neutral-10 rounded-lg dark:text-white  dark:hover:bg-gray-700 group">
                                @if ($active == 'pengajuan')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path fill="#fff"
                                            d="M18.69 11.53c-.57-.15-1.24-.23-2.04-.23-1.11 0-1.52.27-2.09.7-.03.02-.06.05-.09.08l-.95 1.01c-.79.85-2.24.85-3.04 0l-.95-1a.382.382 0 0 0-.09-.09c-.58-.43-.99-.7-2.09-.7-.8 0-1.47.07-2.04.23-2.38.64-2.38 2.53-2.38 4.19v.93c0 2.51 0 5.35 5.35 5.35h7.44c3.55 0 5.35-1.8 5.35-5.35v-.93c0-1.66 0-3.55-2.38-4.19Z" />
                                        <path fill="#fff"
                                            d="M14.79 2H9.21C4.79 2 4.79 4.35 4.79 6.42v3.7c.04-.02.09-.03.13-.04.7-.19 1.49-.28 2.43-.28 1.54 0 2.27.45 2.99 1 .1.07.2.16.29.26l.94.99c.1.11.26.17.43.17.17 0 .33-.06.42-.16l.96-1.01c.08-.08.17-.17.27-.24.74-.56 1.46-1.01 3-1.01.94 0 1.73.09 2.43.28.04.01.09.02.13.04v-3.7c0-2.07 0-4.42-4.42-4.42Zm-1.24 6.5h-3.1c-.38 0-.7-.32-.7-.7 0-.39.32-.7.7-.7h3.1c.38 0 .7.31.7.7 0 .38-.32.7-.7.7Zm.78-2.79H9.67a.7.7 0 0 1-.69-.7c0-.39.31-.7.69-.7h4.66c.38 0 .69.31.69.7a.7.7 0 0 1-.69.7Z" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-miterlimit="10" stroke-width="1.5"
                                            d="M7 12c-4 0-4 1.79-4 4v1c0 2.76 0 5 5 5h8c4 0 5-2.24 5-5v-1c0-2.21 0-4-4-4-1 0-1.28.21-1.8.6l-1.02 1.08a2.999 2.999 0 0 1-4.37 0L8.8 12.6C8.28 12.21 8 12 7 12Zm12 0V6c0-2.21 0-4-4-4H9C5 2 5 3.79 5 6v6" />
                                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5" d="M10.55 9.23h3.33m-4.16-3h5" />
                                    </svg>
                                @endif
                                <span class="flex-1 ms-3 whitespace-nowrap">Permohonan</span>

                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dashboard/pengaduan') }}"
                                class="flex items-center p-2 text-neutral-10 rounded-lg dark:text-white  dark:hover:bg-gray-700 group {{ $active == 'pengaduan' ? 'bg-blue-main hover:bg-blue-main text-white' : 'hover:bg-gray-100' }}">
                                @if ($active == 'pengaduan')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path fill="#fff"
                                            d="M13.19 6h-6.4c-.26 0-.51.01-.75.04C3.35 6.27 2 7.86 2 10.79v4c0 4 1.6 4.79 4.79 4.79h.4c.22 0 .51.15.64.32l1.2 1.6c.53.71 1.39.71 1.92 0l1.2-1.6c.15-.2.39-.32.64-.32h.4c2.93 0 4.52-1.34 4.75-4.04.03-.24.04-.49.04-.75v-4c0-3.19-1.6-4.79-4.79-4.79ZM6.5 14c-.56 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1Zm3.49 0c-.56 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.44 1-1 1Zm3.5 0c-.56 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1Z" />
                                        <path fill="#fff"
                                            d="M21.98 6.79v4c0 2-.62 3.36-1.86 4.11-.3.18-.65-.06-.65-.41l.01-3.7c0-4-2.29-6.29-6.29-6.29l-6.09.01c-.35 0-.59-.35-.41-.65C7.44 2.62 8.8 2 10.79 2h6.4c3.19 0 4.79 1.6 4.79 4.79Z" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-miterlimit="10" stroke-width="1.5"
                                            d="M17.98 10.79v4c0 .26-.01.51-.04.75-.23 2.7-1.82 4.04-4.75 4.04h-.4c-.25 0-.49.12-.64.32l-1.2 1.6c-.53.71-1.39.71-1.92 0l-1.2-1.6a.924.924 0 0 0-.64-.32h-.4C3.6 19.58 2 18.79 2 14.79v-4c0-2.93 1.35-4.52 4.04-4.75.24-.03.49-.04.75-.04h6.4c3.19 0 4.79 1.6 4.79 4.79Z" />
                                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-miterlimit="10" stroke-width="1.5"
                                            d="M21.98 6.79v4c0 2.94-1.35 4.52-4.04 4.75.03-.24.04-.49.04-.75v-4c0-3.19-1.6-4.79-4.79-4.79h-6.4c-.26 0-.51.01-.75.04C6.27 3.35 7.86 2 10.79 2h6.4c3.19 0 4.79 1.6 4.79 4.79Z" />
                                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M13.495 13.25h.01m-3.51 0h.01m-3.51 0h.01" />
                                    </svg>
                                @endif
                                <span class="flex-1 ms-3 whitespace-nowrap">Pengaduan</span>

                            </a>
                        </li>

                    </ul>
                    <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                        <li>
                            <a href="{{ url('dashboard/penduduk') }}"
                                class="{{ $active == 'penduduk' ? 'bg-blue-main hover:bg-blue-main text-white' : 'hover:bg-gray-100' }}  flex items-center p-2 text-neutral-10 transition duration-75 rounded-lg  dark:hover:bg-gray-700 dark:text-white group">
                                @if ($active == 'penduduk')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path fill="#fff"
                                            d="M17.53 7.77a.739.739 0 0 0-.21 0 2.874 2.874 0 0 1-2.78-2.88C14.54 3.3 15.83 2 17.43 2c1.59 0 2.89 1.29 2.89 2.89a2.89 2.89 0 0 1-2.79 2.88Zm3.26 6.93c-1.12.75-2.69 1.03-4.14.84.38-.82.58-1.73.59-2.69 0-1-.22-1.95-.64-2.78 1.48-.2 3.05.08 4.18.83 1.58 1.04 1.58 2.75.01 3.8ZM6.44 7.77c.07-.01.14-.01.21 0a2.874 2.874 0 0 0 2.78-2.88 2.885 2.885 0 1 0-5.77 0c0 1.56 1.23 2.83 2.78 2.88Zm.11 5.08c0 .97.21 1.89.59 2.72-1.41.15-2.88-.15-3.96-.86-1.58-1.05-1.58-2.76 0-3.81 1.07-.72 2.58-1.01 4-.85-.41.84-.63 1.79-.63 2.8Zm5.57 3.02a1.13 1.13 0 0 0-.26 0 3.425 3.425 0 0 1-3.31-3.43C8.56 10.54 10.09 9 12 9c1.9 0 3.44 1.54 3.44 3.44a3.434 3.434 0 0 1-3.32 3.43Zm-3.25 2.07c-1.51 1.01-1.51 2.67 0 3.67 1.72 1.15 4.54 1.15 6.26 0 1.51-1.01 1.51-2.67 0-3.67-1.71-1.15-4.53-1.15-6.26 0Z" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M18 7.16a.605.605 0 0 0-.19 0 2.573 2.573 0 0 1-2.48-2.58c0-1.43 1.15-2.58 2.58-2.58a2.58 2.58 0 0 1 2.58 2.58A2.589 2.589 0 0 1 18 7.16Zm-1.03 7.28c1.37.23 2.88-.01 3.94-.72 1.41-.94 1.41-2.48 0-3.42-1.07-.71-2.6-.95-3.97-.71M5.97 7.16c.06-.01.13-.01.19 0a2.573 2.573 0 0 0 2.48-2.58C8.64 3.15 7.49 2 6.06 2a2.58 2.58 0 0 0-2.58 2.58c.01 1.4 1.11 2.53 2.49 2.58ZM7 14.44c-1.37.23-2.88-.01-3.94-.72-1.41-.94-1.41-2.48 0-3.42 1.07-.71 2.6-.95 3.97-.71M12 14.63a.605.605 0 0 0-.19 0 2.573 2.573 0 0 1-2.48-2.58c0-1.43 1.15-2.58 2.58-2.58a2.58 2.58 0 0 1 2.58 2.58c-.01 1.4-1.11 2.54-2.49 2.58Zm-2.91 3.15c-1.41.94-1.41 2.48 0 3.42 1.6 1.07 4.22 1.07 5.82 0 1.41-.94 1.41-2.48 0-3.42-1.59-1.06-4.22-1.06-5.82 0Z" />
                                    </svg>
                                @endif
                                <span class="ms-3">Data Penduduk</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dashboard/bansos') }}"
                                class="{{ $active == 'bansos' ? 'bg-blue-main hover:bg-blue-main text-white' : 'hover:bg-gray-100' }}  flex items-center p-2 text-neutral-10 transition duration-75 rounded-lg  dark:hover:bg-gray-700 dark:text-white group">
                                @if ($active == 'bansos')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path fill="#fff"
                                            d="M16.19 2.33H7.81C4.17 2.33 2 4.51 2 8.15v8.37c0 3.64 2.17 5.81 5.81 5.81h8.37c3.64 0 5.81-2.17 5.81-5.81V8.15c.01-3.64-2.16-5.82-5.8-5.82Zm-4.62 14.79c0 .3-.15.57-.41.73-.14.09-.29.13-.45.13-.13 0-.26-.03-.39-.09l-3.5-1.75c-.5-.26-.82-.77-.82-1.34v-3.31a.867.867 0 0 1 1.25-.77l3.5 1.75c.51.26.83.77.83 1.34v3.31h-.01Zm-.21-5.35L7.6 9.74a.87.87 0 0 1-.44-.77c0-.32.17-.62.44-.77l3.76-2.03c.4-.21.87-.21 1.27 0l3.76 2.03c.27.15.44.44.44.77s-.17.62-.44.77l-3.76 2.03c-.2.11-.42.16-.64.16-.22 0-.43-.05-.63-.16ZM18 14.8c0 .57-.32 1.09-.83 1.34l-3.5 1.75a.86.86 0 0 1-.39.09c-.16 0-.31-.04-.45-.13a.847.847 0 0 1-.41-.73v-3.31c0-.57.32-1.09.83-1.34l3.5-1.75a.867.867 0 0 1 1.25.77v3.31Z" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M9 22h6c5 0 7-2 7-7V9c0-5-2-7-7-7H9C4 2 2 4 2 9v6c0 5 2 7 7 7Z" />
                                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5" d="m6.7 9.26 5.3 3.07 5.26-3.05M12 17.77v-5.45" />
                                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="m10.76 6.29-3.2 1.78c-.72.4-1.32 1.41-1.32 2.24v3.39c0 .83.59 1.84 1.32 2.24l3.2 1.78c.68.38 1.8.38 2.49 0l3.2-1.78c.72-.4 1.32-1.41 1.32-2.24v-3.4c0-.83-.59-1.84-1.32-2.24l-3.2-1.78c-.69-.38-1.81-.38-2.49.01Z" />
                                    </svg>
                                @endif
                                <span class="ms-3">Bansos</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('dashboard/kas') }}"
                                class="{{ $active == 'kas' ? 'bg-blue-main hover:bg-blue-main text-white' : 'hover:bg-gray-100' }}  flex items-center p-2 text-neutral-10 transition duration-75 rounded-lg  dark:hover:bg-gray-700 dark:text-white group">
                                @if ($active == 'kas')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path fill="#fff"
                                            d="M22 10.97v2.06c0 .55-.44 1-1 1.02h-1.96c-1.08 0-2.07-.79-2.16-1.87-.06-.63.18-1.22.6-1.63.37-.38.88-.6 1.44-.6H21c.56.02 1 .47 1 1.02Z" />
                                        <path fill="#fff"
                                            d="M20.47 15.55h-1.43c-1.9 0-3.5-1.43-3.66-3.25-.09-1.04.29-2.08 1.05-2.82.64-.66 1.53-1.03 2.49-1.03h1.55c.29 0 .53-.24.5-.53-.22-2.43-1.83-4.09-4.22-4.37-.24-.04-.49-.05-.75-.05H7c-.28 0-.55.02-.81.06C3.64 3.88 2 5.78 2 8.5v7c0 2.76 2.24 5 5 5h9c2.8 0 4.73-1.75 4.97-4.42a.49.49 0 0 0-.5-.53ZM13 9.75H7c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h6c.41 0 .75.34.75.75s-.34.75-.75.75Z" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M13 9H7m15 1.97v2.06c0 .55-.44 1-1 1.02h-1.96c-1.08 0-2.07-.79-2.16-1.87-.06-.63.18-1.22.6-1.63.37-.38.88-.6 1.44-.6H21c.56.02 1 .47 1 1.02Z" />
                                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M17.48 10.55c-.42.41-.66 1-.6 1.63.09 1.08 1.08 1.87 2.16 1.87H21v1.45c0 3-2 5-5 5H7c-3 0-5-2-5-5v-7c0-2.72 1.64-4.62 4.19-4.94.26-.04.53-.06.81-.06h9c.26 0 .51.01.75.05C19.33 3.85 21 5.76 21 8.5v1.45h-2.08c-.56 0-1.07.22-1.44.6Z" />
                                    </svg>
                                @endif
                                <span class="ms-3">Kas</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/dashboard/persuratan') }}"
                                class="{{ $active == 'persuratan' ? 'bg-blue-main hover:bg-blue-main text-white' : 'hover:bg-gray-100' }} flex items-center p-2 text-neutral-10 transition duration-75 rounded-lg  dark:hover:bg-gray-700 dark:text-white group">
                                @if ($active == 'persuratan')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path fill="#fff"
                                            d="M15.8 2.21c-.41-.41-1.12-.13-1.12.44v3.49c0 1.46 1.24 2.67 2.75 2.67.95.01 2.27.01 3.4.01.57 0 .87-.67.47-1.07-1.44-1.45-4.02-4.06-5.5-5.54Z" />
                                        <path fill="#fff"
                                            d="M20.5 10.19h-2.89c-2.37 0-4.3-1.93-4.3-4.3V3c0-.55-.45-1-1-1H8.07C4.99 2 2.5 4 2.5 7.57v8.86C2.5 20 4.99 22 8.07 22h7.86c3.08 0 5.57-2 5.57-5.57v-5.24c0-.55-.45-1-1-1Zm-9 7.56h-4c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h4c.41 0 .75.34.75.75s-.34.75-.75.75Zm2-4h-6c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h6c.41 0 .75.34.75.75s-.34.75-.75.75Z" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path fill="#1B1B1B"
                                            d="M15 22.75H9c-5.43 0-7.75-2.32-7.75-7.75V9c0-5.43 2.32-7.75 7.75-7.75h5c.41 0 .75.34.75.75s-.34.75-.75.75H9C4.39 2.75 2.75 4.39 2.75 9v6c0 4.61 1.64 6.25 6.25 6.25h6c4.61 0 6.25-1.64 6.25-6.25v-5c0-.41.34-.75.75-.75s.75.34.75.75v5c0 5.43-2.32 7.75-7.75 7.75Z" />
                                        <path fill="#1B1B1B"
                                            d="M22 10.75h-4c-3.42 0-4.75-1.33-4.75-4.75V2c0-.3.18-.58.46-.69.28-.12.6-.05.82.16l8 8a.751.751 0 0 1-.53 1.28Zm-7.25-6.94V6c0 2.58.67 3.25 3.25 3.25h2.19l-5.44-5.44ZM13 13.75H7c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h6c.41 0 .75.34.75.75s-.34.75-.75.75Zm-2 4H7c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h4c.41 0 .75.34.75.75s-.34.75-.75.75Z" />
                                    </svg>
                                @endif
                                <span class="ms-3">Persuratan</span>
                            </a>
                        </li>


                    </ul>
                </div>

                <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                    <li>
                        <a href="{{ url('logout') }}"
                            class="flex items-center active:bg-blue-main p-2 text-neutral-10 rounded-lg dark:text-white  dark:hover:bg-gray-700 group hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="#EE0B0B" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M8.9 7.56c.31-3.6 2.16-5.07 6.21-5.07h.13c4.47 0 6.26 1.79 6.26 6.26v6.52c0 4.47-1.79 6.26-6.26 6.26h-.13c-4.02 0-5.87-1.45-6.2-4.99M15 12H3.62m2.23-3.35L2.5 12l3.35 3.35" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap text-red-500">Log Out</span>

                        </a>
                    </li>


                </ul>


            </div>
            {{-- <div class="end pb-5 px-3 w-full flex items-end">
         <ul class="mt-12 space-y-2 w-full font-medium">
            <li>
               <a href="#" class="flex items-center p-2 text-red-600 transition duration-75 rounded-lg hover:bg-gray-100  dark:hover:bg-gray-700 dark:text-white group">
    @@ -98,10 +269,8 @@
            </li>
         </ul>

       </div> --}}
        </div>

    </aside>
@else
    <aside id="separator-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full md:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full flex flex-col justify-between">
            <div
                class="h-full font-body flex flex-col justify-between text-sm px-3 py-10 overflow-y-auto bg-white dark:bg-gray-800">
                <div class="top">
                    <div class="logo">
                        <div class="flex flex-shrink-0 space-x-3 justify-center items-center">
                            <img class="h-10 w-auto" src="{{ asset('asset/images/logo/logo.png') }}"
                                alt="Your Company">
                            <a href="#" class="text-dodger-blue-950 font-body font-bold text-xl "> <span
                                    class="text-dodger-blue-700">RW</span>GRAM</a>
                        </div>
                    </div>
                    <ul class="mt-12 space-y-2 font-medium">
                        <li>
                            <a href="{{ url('karangTaruna/') }}"
                                class="{{ $active == 'beranda' ? 'bg-blue-main hover:bg-blue-main text-white' : 'hover:bg-gray-100' }}  flex items-center p-2 text-neutral-10 rounded-lg dark:text-white  dark:hover:bg-gray-700 group">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path fill="{{ $active == 'beranda' ? 'white' : '#1B1B1B' }}"
                                        d="M17.79 22.75H6.21c-2.74 0-4.96-2.23-4.96-4.97v-7.41c0-1.36.84-3.07 1.92-3.91l5.39-4.2C10.18 1 12.77.94 14.45 2.12l6.18 4.33c1.19.83 2.12 2.61 2.12 4.06v7.28c0 2.73-2.22 4.96-4.96 4.96ZM9.48 3.44l-5.39 4.2c-.71.56-1.34 1.83-1.34 2.73v7.41a3.47 3.47 0 0 0 3.46 3.47h11.58c1.91 0 3.46-1.55 3.46-3.46v-7.28c0-.96-.69-2.29-1.48-2.83l-6.18-4.33c-1.14-.8-3.02-.76-4.11.09Z" />
                                    <path fill="{{ $active == 'beranda' ? 'white' : '#1B1B1B' }}"
                                        d="M12 18.75c-.41 0-.75-.34-.75-.75v-3c0-.41.34-.75.75-.75s.75.34.75.75v3c0 .41-.34.75-.75.75Z" />
                                </svg>


                                <span class="ms-3">Beranda</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('karangTaruna/informasi') }}"
                                class="flex items-center {{ $active == 'informasi' ? 'bg-blue-main hover:bg-blue-main text-white' : 'hover:bg-gray-100' }}  p-2 text-neutral-10 rounded-lg dark:text-white  dark:hover:bg-gray-700 group">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="{{ $active == 'informasi' ? 'white' : '#1B1B1B' }}"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                        stroke-width="1.5"
                                        d="M7 12c-4 0-4 1.79-4 4v1c0 2.76 0 5 5 5h8c4 0 5-2.24 5-5v-1c0-2.21 0-4-4-4-1 0-1.28.21-1.8.6l-1.02 1.08a2.999 2.999 0 0 1-4.37 0L8.8 12.6C8.28 12.21 8 12 7 12Zm12 0V6c0-2.21 0-4-4-4H9C5 2 5 3.79 5 6v6" />
                                    <path stroke="{{ $active == 'informasi' ? 'white' : '#1B1B1B' }}"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M10.55 9.23h3.33m-4.16-3h5" />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">Informasi</span>

                            </a>
                        </li>
                        <li>
                            <a href="{{ url('karangTaruna/pengumuman') }}"
                                class="flex items-center active:bg-blue-main p-2 text-neutral-10 rounded-lg dark:text-white  dark:hover:bg-gray-700 group {{ $active == 'pengumuman' ? 'bg-blue-main hover:bg-blue-main text-white' : 'hover:bg-gray-100' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="{{ $active == 'pengumuman' ? 'white' : '#1B1B1B' }}"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                        stroke-width="1.5"
                                        d="M17.98 10.79v4c0 .26-.01.51-.04.75-.23 2.7-1.82 4.04-4.75 4.04h-.4c-.25 0-.49.12-.64.32l-1.2 1.6c-.53.71-1.39.71-1.92 0l-1.2-1.6a.924.924 0 0 0-.64-.32h-.4C3.6 19.58 2 18.79 2 14.79v-4c0-2.93 1.35-4.52 4.04-4.75.24-.03.49-.04.75-.04h6.4c3.19 0 4.79 1.6 4.79 4.79Z" />
                                    <path stroke="{{ $active == 'pengumuman' ? 'white' : '#1B1B1B' }}"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                        stroke-width="1.5"
                                        d="M21.98 6.79v4c0 2.94-1.35 4.52-4.04 4.75.03-.24.04-.49.04-.75v-4c0-3.19-1.6-4.79-4.79-4.79h-6.4c-.26 0-.51.01-.75.04C6.27 3.35 7.86 2 10.79 2h6.4c3.19 0 4.79 1.6 4.79 4.79Z" />
                                    <path stroke="{{ $active == 'pengumuman' ? 'white' : '#1B1B1B' }}"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.495 13.25h.01m-3.51 0h.01m-3.51 0h.01" />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">Pengumuman</span>

                            </a>
                        </li>


                </div>

                <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                    <li>
                        <a href="{{ url('logout') }}"
                            class="flex items-center active:bg-blue-main p-2 text-neutral-10 rounded-lg dark:text-white  dark:hover:bg-gray-700 group hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="#EE0B0B" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M8.9 7.56c.31-3.6 2.16-5.07 6.21-5.07h.13c4.47 0 6.26 1.79 6.26 6.26v6.52c0 4.47-1.79 6.26-6.26 6.26h-.13c-4.02 0-5.87-1.45-6.2-4.99M15 12H3.62m2.23-3.35L2.5 12l3.35 3.35" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap text-red-500">Log Out</span>

                        </a>
                    </li>


                </ul>


            </div>
            {{-- <div class="end pb-5 px-3 w-full flex items-end">

         <ul class="mt-12 space-y-2 w-full font-medium">
            <li>
               <a href="#" class="flex items-center p-2 text-red-600 transition duration-75 rounded-lg hover:bg-gray-100  dark:hover:bg-gray-700 dark:text-white group">
    @@ -98,10 +269,8 @@
            </li>
         </ul>

       </div> --}}
        </div>

    </aside>
@endif
