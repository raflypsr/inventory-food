<x-app-layout>
    <x-slot name="title">
        {{ __('Dashboard') }}
    </x-slot>

    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    @if (Auth::check())
        @if (Auth::user()->role == 'admin')
            <x-slot name="slot">
                @if (session('success'))
                    <div style="background-color: rgba(59, 187, 174, 0.474)"
                        class="mb-4 rounded-md border border-cyan-400 px-6 py-2 text-cyan-900 text-base mx-24"
                        role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="flex flex-col justify-evenly items-center sm:flex-row">
                    <div class="flex bg-gray-100 sm:bg-white w-1/4 drop-shadow-none sm:drop-shadow-xl py-2 sm:py-0">
                        <div class="bg-green-500 p-3 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="white"
                                class="bi bi-person-workspace" viewBox="0 0 16 16">
                                <path
                                    d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                <path
                                    d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
                            </svg>
                        </div>
                        <div class="flex flex-col w-full items-center">
                            <div class="pt-2">Petugas</div>
                            <div class="text-5xl">{{ $petugasCount }}</div>
                        </div>
                    </div>
                    <div class="flex bg-gray-100 sm:bg-white w-1/4 drop-shadow-none sm:drop-shadow-xl py-2 sm:py-0">
                        <div class="bg-blue-500 p-3 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="white"
                                class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                                <path fill-rule="evenodd"
                                    d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg>
                        </div>
                        <div class="flex flex-col w-full items-center">
                            <div class="pt-2">Bahan Masuk</div>
                            <div class="text-5xl">{{ $bahanMasukCount }}</div>
                        </div>
                    </div>
                    <div class="flex bg-gray-100 sm:bg-white w-1/4 drop-shadow-none sm:drop-shadow-xl py-2 sm:py-0">
                        <div class="bg-red-500 p-3 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="white"
                                class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                <path fill-rule="evenodd"
                                    d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                            </svg>
                        </div>
                        <div class="flex flex-col w-full items-center">
                            <div class="pt-2">Bahan Keluar</div>
                            <div class="text-5xl">{{ $bahanKeluarCount }}</div>
                        </div>
                    </div>
                </div>
            </x-slot>
        @endif
        @if (Auth::user()->role == 'petugas')
            <x-slot name="slot">
                @if (session('success'))
                    <div style="background-color: rgba(59, 187, 174, 0.474)"
                        class="mb-4 rounded-md border border-cyan-400 px-6 py-2 text-cyan-900 text-base mx-24"
                        role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div style="height: 86vh">
                    <div class="flex flex-col justify-evenly items-center lg:flex-row h-1/4 lg:mb-0 mb-20">
                        <div class="flex bg-gray-100 lg:bg-white w-1/5 drop-shadow-none lg:drop-shadow-xl py-2 lg:py-0">
                            <div class="bg-yellow-300 p-3 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="white"
                                    class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                </svg>
                            </div>
                            <div class="flex flex-col w-full items-center">
                                <div class="pt-2 lg:block hidden">Supplier</div>
                                <div class="lg:text-5xl text-xl">{{ $supplierCount }}</div>
                            </div>
                        </div>
                        <div class="flex bg-gray-100 lg:bg-white w-1/5 drop-shadow-none lg:drop-shadow-xl py-2 lg:py-0">
                            <div class="bg-green-500 p-3 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="white"
                                    class="bi bi-boxes" viewBox="0 0 16 16">
                                    <path
                                        d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z" />
                                </svg>
                            </div>
                            <div class="flex flex-col w-full items-center">
                                <div class="pt-2 lg:block hidden">Jenis Bahan</div>
                                <div class="lg:text-5xl text-xl">{{ $bahanCount }}</div>
                            </div>
                        </div>
                        <div class="flex bg-gray-100 lg:bg-white w-1/5 drop-shadow-none lg:drop-shadow-xl py-2 lg:py-0">
                            <div class="bg-blue-500 p-3 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" fill="white"
                                    class="bi bi-cart-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                                    <path
                                        d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                            </div>
                            <div class="flex flex-col w-full items-center">
                                <div class="pt-2 lg:block hidden">Jumlah Bahan</div>
                                <div class="lg:text-5xl text-xl">{{ $jumlahBahanCount }}</div>
                            </div>
                        </div>
                    </div>
                    <div class=" h-3/4 flex flex-col flex-wrap overflow-auto">
                        <table class="">
                            @foreach ($pendingKadaluarsa as $item)
                                <div style="background-color: rgba(255, 0, 0, 0.211)"
                                    class=" md:rounded-md border border-red-500 p-2 m-1 text-black text-base text-left md:text-center"
                                    role="alert">
                                    {{ $item }} hari
                                </div>
                            @endforeach
                            @foreach ($listKadaluarsa as $key => $item)
                                <div x-data="{ hapus: false }">
                                    <button @click="hapus =!hapus" type="submit"
                                        style="background-color: rgba(0, 120, 6, 0.493)"
                                        class="md:rounded-md w-full border border-green-700 p-2 m-1 text-black text-base text-left md:text-center"
                                        role="alert">
                                        {{ $item }}
                                    </button>
                                    <div x-show="hapus" class="fixed inset-5 z-50" aria-labelledby="detail-title"
                                        role="dialog" aria-modal="true">
                                        <div
                                            class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                                            <div x-cloak @click="hapus = false" x-show="hapus"
                                                x-transition:enter="transition ease-out duration-300 transform"
                                                x-transition:enter-start="opacity-0"
                                                x-transition:enter-end="opacity-100"
                                                x-transition:leave="transition ease-in duration-200 transform"
                                                x-transition:leave-start="opacity-100"
                                                x-transition:leave-end="opacity-0"
                                                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40"
                                                aria-hidden="true"></div>

                                            <div x-cloak x-show="hapus"
                                                class="inline-block w-full max-w-xl p-3 my-20 overflow-hidden transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                                                <div class="flex flex-col">
                                                    <form
                                                        action="{{ route('bahan-kadaluarsa.destroy', $kadaluarsaId[$key]) }} " 
                                                        method="POST" @click="hapus =!hapus">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-lg text-white tracking-wide text-black p-1 capitalize transition-colors duration-200 transform rounded-md bg-red-500">
                                                            Konfirmasi
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </table>
                    </div>
                </div>
            </x-slot>
        @endif
    @endif
</x-app-layout>
