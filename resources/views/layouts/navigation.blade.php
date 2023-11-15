<div style="background-color: #116D6E"class="w-16 sm:w-64 h-screen absolute sm:relative shadow ">
    <div>
        <div class="h-16 w-full flex items-center px-5">
            <a href="/" class="flex justify-between w-full items-center">
                <span class="text-white text-4xl hidden sm:inline ">{{ ucfirst(Auth::user()->role) }}</span>
                <span class="text-white text-4xl inline sm:hidden ">{{ ucfirst(Auth::user()->role)[0] }}</span>
            </a>
        </div>
        @if (Auth::check())
            @if (Auth::user()->role == 'admin')
                <ul x-data="{ open: true }">
                    <li class="flex w-full justify-between text-white cursor-pointer items-center py-1">
                        <x-nav-link :href="route('data-petugas.index')" :active="request()->routeIs('data-petugas.index')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-person" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                            </svg>
                            <p class="ml-1 hidden sm:block">

                                {{ __('Data Petugas') }}
                            </p>
                        </x-nav-link>
                    </li>
                    <li class="flex w-full justify-between text-white hover:text-white cursor-pointer items-center "
                        x-on:click="open = ! open">
                        <a href="javascript:void(0)" class="flex items-center w-full h-14 px-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-printer" viewBox="0 0 16 16">
                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                <path
                                    d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                            </svg>
                            <div class="flex justify-between items-center w-full hidden sm:block">
                                <span class="text-sm ml-3 ">Cetak Laporan</span>
                                <span x-show="!open" class="text-xl ">></span>
                                <span x-show="open">v</span>
                            </div>
                        </a>

                    </li>
                    <div x-show="open" x-transition x-transition:leave.duration.200ms>
                        <li class="flex w-full justify-between text-white cursor-pointer items-center py-1 sm:pl-4">

                            <x-nav-link :href="route('cetak-bahan-masuk')" :active="request()->routeIs('cetak-bahan-masuk')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    fill="currentColor" class="bi bi-box-arrow-in-down-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M6.364 2.5a.5.5 0 0 1 .5-.5H13.5A1.5 1.5 0 0 1 15 3.5v10a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 2 13.5V6.864a.5.5 0 1 1 1 0V13.5a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5v-10a.5.5 0 0 0-.5-.5H6.864a.5.5 0 0 1-.5-.5z" />
                                    <path fill-rule="evenodd"
                                        d="M11 10.5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1 0-1h3.793L1.146 1.854a.5.5 0 1 1 .708-.708L10 9.293V5.5a.5.5 0 0 1 1 0v5z" />
                                </svg>
                                <p class="ml-1 hidden sm:block">
                                    {{ __('Bahan Masuk') }}
                                </p>
                            </x-nav-link>
                        </li>
                        <li class="flex w-full justify-between text-white cursor-pointer items-center py-1 sm:pl-4">
                            <x-nav-link :href="route('cetak-bahan-keluar')" :active="request()->routeIs('cetak-bahan-keluar')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    fill="currentColor" class="bi bi-box-arrow-down-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8.636 12.5a.5.5 0 0 1-.5.5H1.5A1.5 1.5 0 0 1 0 11.5v-10A1.5 1.5 0 0 1 1.5 0h10A1.5 1.5 0 0 1 13 1.5v6.636a.5.5 0 0 1-1 0V1.5a.5.5 0 0 0-.5-.5h-10a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h6.636a.5.5 0 0 1 .5.5z" />
                                    <path fill-rule="evenodd"
                                        d="M16 15.5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1 0-1h3.793L6.146 6.854a.5.5 0 1 1 .708-.708L15 14.293V10.5a.5.5 0 0 1 1 0v5z" />
                                </svg>
                                <p class="ml-1 hidden sm:block">
                                    {{ __('Bahan Keluar') }}
                                </p>
                            </x-nav-link>
                        </li>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        <li class="flex w-full text-white cursor-pointer items-center mb-6 ml-5">
                            <button class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                    <path fill-rule="evenodd"
                                        d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                </svg>
                                @csrf
                                <x-dropdown-link :href="route('logout')" class="ml-1.5 hidden sm:block"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}

                                </x-dropdown-link>
                            </button>
                        </li>
                    </form>
                </ul>
                <script>
                    var sideBar = document.getElementById("mobile-nav");
                    var openSidebar = document.getElementById("openSideBar");
                    var closeSidebar = document.getElementById("closeSideBar");
                    sideBar.style.transform = "translateX(-260px)";

                    function sidebarHandler(flag) {
                        if (flag) {
                            sideBar.style.transform = "translateX(0px)";
                            openSidebar.classList.add("hidden");
                            closeSidebar.classList.remove("hidden");
                        } else {
                            sideBar.style.transform = "translateX(-260px)";
                            closeSidebar.classList.add("hidden");
                            openSidebar.classList.remove("hidden");
                        }
                    }
                </script>
            @endif
            @if (Auth::user()->role == 'petugas')
                <ul>
                    <li class="flex w-full justify-between text-white cursor-pointer items-center py-1">
                        <x-nav-link :href="route('data-supplier')" :active="request()->routeIs('data-supplier*')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-person" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                            </svg>
                            <p class="ml-1 hidden sm:block">
                                {{ __('Data Supplier') }}
                            </p>
                        </x-nav-link>
                    </li>
                    <li class="flex w-full justify-between text-white cursor-pointer items-center">
                        <x-nav-link :href="route('data-bahan')" :active="request()->routeIs('data-bahan*')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-apple" viewBox="0 0 16 16">
                                <path
                                    d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43Zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282Z" />
                                <path
                                    d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43Zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282Z" />
                            </svg>
                            <p class="ml-1 hidden sm:block">
                                {{ __('Data Bahan') }}
                            </p>
                        </x-nav-link>
                    </li>
                    <li class="flex w-full justify-between text-white cursor-pointer items-center">
                        <x-nav-link :href="route('bahan-masuk')" :active="request()->routeIs('bahan-masuk*')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-cart-plus" viewBox="0 0 16 16">
                                <path
                                    d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                                <path
                                    d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                            </svg>
                            <p class="ml-1 hidden sm:block">
                                {{ __('Bahan Masuk') }}
                            </p>
                        </x-nav-link>
                    </li>
                    <li class="flex w-full justify-between text-white cursor-pointer items-center">
                        <x-nav-link :href="route('bahan-keluar')" :active="request()->routeIs('bahan-keluar*')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-cart-dash" viewBox="0 0 16 16">
                                <path d="M6.5 7a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z" />
                                <path
                                    d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                            </svg>
                            <p class="ml-1 hidden sm:block">
                                {{ __('Bahan Keluar') }}
                            </p>
                        </x-nav-link>
                    </li>
                    <li class="flex w-full text-white cursor-pointer items-center mb-6 ml-5">
                        <a href="javascript:void(0)" class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                <path fill-rule="evenodd"
                                    d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                            </svg>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" class="ml-1.5 hidden sm:block"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </a>
                    </li>
                </ul>
            @endif
        @endif
    </div>
</div>
