<x-app-layout>
    <x-slot name="title">
        {{ __('Data-Supplier') }}
    </x-slot>

    <x-slot name="header">
        {{ __('Data Supplier') }}
    </x-slot>

    <x-slot name="slot">
        <div class="flex md:flex-row flex-col my-3 items-end items-center justify-around">
            <div class="flex sm:flex-row flex-col py-1">
                <div class="h-10 w-24 text-white flex flex-row items-center mx-2 rounded-lg my-1"
                    style="background-color: #22A699">
                    <div x-data="{ modelOpen: false }">
                        <button @click="modelOpen =!modelOpen"
                            class="flex items-center justify-center py-2  text-sm tracking-wide text-white capitalize transition-colors duration-200 transform rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                            <span>Create</span>
                        </button>

                        <div x-show="modelOpen" class="fixed -inset-5 z-50" aria-labelledby="modal-title" role="dialog"
                            aria-modal="true">
                            <div
                                class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                                <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                    x-transition:enter="transition ease-out duration-300 transform"
                                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-200 transform"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40"
                                    aria-hidden="true"></div>

                                <div x-cloak x-show="modelOpen"
                                    x-transition:enter="transition ease-out duration-300 transform"
                                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave="transition ease-in duration-200 transform"
                                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                                    <div class="flex items-center justify-between space-x-4">
                                        <h1 class="text-xl font-medium text-gray-800 ">Tambah Data Supplier</h1>
                                    </div>

                                    <form class="mt-5" action="{{ route('data-supplier.store') }}" method="post"
                                        x-data="{ selectedCount: 0, search: '', alamat: '{{ old('alamat') }}' }">
                                        @csrf
                                        <div>
                                            <input placeholder="Nama" type="text" name="name"
                                                value="{{ old('name') }}"
                                                class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"
                                                required>
                                            @error('name')
                                                <div class="text-red-500 mb-2 text-sm" x-init="modelOpen = true">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mt-3">
                                            <input placeholder="Email" type="email" required name="email"
                                                value="{{ old('email') }}"
                                                class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                            @error('email')
                                                <div class="text-red-500 mb-2 text-sm">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mt-3">
                                            <select name="options[]" class="text-black w-full border border-gray-200"
                                                multiple required
                                                @change="selectedCount = $event.target.selectedOptions.length">
                                                @foreach ($bahanOption as $key => $value)
                                                    <option value="{{ $key }}">
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <p class="text-black">Jumlah data yang dipilih: <span
                                                    x-text="selectedCount"></span></p>
                                            @error('options')
                                                <div class="text-red-500 mb-2 text-sm">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mt-3">
                                            <input placeholder="No Telepon" type="number" required name="telepon"
                                                value="{{ old('telepon') }}"
                                                class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                            @error('telepon')
                                                <div class="text-red-500 mb-2 text-sm" x-init="modelOpen = true">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mt-3">
                                            <textarea x-model="alamat" x-model="alamat" required placeholder="Alamat : Masukan Lebih Dari 30 Kata" type="text"
                                                name="alamat"
                                                class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"></textarea>
                                            <small x-show="alamat.length > 0 && alamat.length < 30"
                                                x-text="alamat.length" class="text-red-500"></small>
                                            <small x-show="alamat.length > 29" x-text="alamat.length"
                                                class="text-green-500"></small>
                                            @error('alamat')
                                                <div class="text-red-500 mb-2 text-sm" x-init="modelOpen = true">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                        <div class="flex justify-end mt-5">
                                            <button type="submit" :disabled="alamat.length > 29 ? false : true"
                                                :style="alamat.length < 30 ? 'background-color: #135851' :
                                                    'background-color: #22A699'"
                                                class="px-3 py-2 flex mx-2 flex-row text-sm tracking-wide text-white capitalize transition-colors duration-200 transform rounded-md "
                                                style="background-color: #22A699">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                                </svg>
                                                <p>Submit</p>
                                            </button>
                                            <button type="reset" @click="selectedCount = 0"
                                                class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform rounded-md "
                                                style="background-color: #CD1818">
                                                Reset
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('data-supplier-search') }}" class="flex items-center my-1">
                <button type="submit" class="rounded-l-full h-10 w-10 flex justify-center items-center"
                    style="background-color: #22A699">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
                <input type="text" name="name" class="h-10 rounded-r-full w-24 sm:w-full p-1"
                    placeholder="Cari Nama...">
            </form>
        </div>
        @if (session('success'))
            <div style="background-color: rgba(59, 187, 174, 0.474)"
                class="mb-4 rounded-md border border-cyan-400 px-6 py-2 text-cyan-900 text-base w-1/2 mx-24"
                role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (!session('success'))
            <div class="mb-4 rounded-md px-6 py-2 text-cyan-900 text-base w-1/2 mx-24" role="alert">
            </div>
        @endif
        <div class="overflow-x-auto sm:w-full w-2/3 sm:ml-0 ml-20">
            <table class="border-collapse border border-slate-400 container mx-auto w-10/12">
                <thead>
                    <tr style="background-color: #116D6E" class="text-white">
                        <th class="border border-neutral-900 p-2">No</th>
                        <th class="border border-neutral-900 p-2">Nama</th>
                        <th class="border border-neutral-900 p-2">Jenis Bahan</th>
                        <th class="border border-neutral-900 p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                        <tr class="text-center" x-data="{ detailOpen: false, hapus: false }">
                            <td class="border border-neutral-900">{{ $loop->iteration }}</td>
                            <td class="border border-neutral-900">{{ $supplier['name'] }}</td>
                            <td class="border border-neutral-900">
                                {{-- ulang data bahan yang terkait supplier saat ini --}}
                                @foreach ($supplier->bahan as $bahan)
                                    {{ $bahan->nama_bahan }},
                                @endforeach
                            </td>
                            <td class="border border-neutral-900">
                                <div class="flex items-center justify-center">
                                    <form action="{{ route('data-supplier.edit', ['id' => $supplier['id']]) }}">
                                        <button
                                            class="flex items-center justify-center py-2 mx-1 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor"
                                                class="bi bi-arrow-repeat bg-yellow-300 rounded-lg p-1 mx-auto "
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                                <path fill-rule="evenodd"
                                                    d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                                            </svg>
                                        </button>
                                    </form>

                                    <div>
                                        <button type="submit" @click="hapus =!hapus"
                                            class="flex items-center justify-center py-2 mx-1 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor"
                                                class="bi bi-trash3 bg-red-500 rounded-lg p-1 mx-auto "
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                            </svg>
                                        </button>
                                    </div>
                                    {{-- modal hapus --}}
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
                                                class="inline-block w-full max-w-xl p-3 my-20 overflow-hidden text-left transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                                                <div class="flex flex-col px-5">
                                                    <form
                                                        action="{{ route('data-supplier.destroy', $supplier['id']) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-lg text-white w-full tracking-wide text-black p-1 capitalize transition-colors duration-200 transform rounded-md bg-red-500">
                                                            Konfirmasi
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button @click="detailOpen =!detailOpen"
                                        class="flex items-center justify-center py-2 mx-1 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            fill="currentColor"
                                            class="bi bi-eye-fill bg-cyan-500 rounded-lg p-1 mx-auto "
                                            viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                            <path
                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                        </svg>
                                    </button>
                                    <div x-show="detailOpen" class="fixed -inset-5 z-50"
                                        aria-labelledby="detail-title" role="dialog" aria-modal="true">
                                        <div
                                            class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                                            <div x-cloak @click="detailOpen = false" x-show="detailOpen"
                                                x-transition:enter="transition ease-out duration-300 transform"
                                                x-transition:enter-start="opacity-0"
                                                x-transition:enter-end="opacity-100"
                                                x-transition:leave="transition ease-in duration-200 transform"
                                                x-transition:leave-start="opacity-100"
                                                x-transition:leave-end="opacity-0"
                                                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40"
                                                aria-hidden="true"></div>

                                            <div x-cloak x-show="detailOpen"
                                                x-transition:enter="transition ease-out duration-300 transform"
                                                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                x-transition:leave="transition ease-in duration-200 transform"
                                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                class="inline-block w-full max-w-xl p-3 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                                                <div class="flex flex-row px-3">
                                                    <div class="py-4">
                                                        <div class="flex items-center justify-between space-x-4">
                                                            <h1 class="text-xl font-medium text-gray-800 ">Detail Data
                                                                Petugas
                                                            </h1>
                                                        </div>
                                                        <div>
                                                            <p class="py-2">Alamat : {{ $supplier['alamat'] }}</p>
                                                            <p class="py-2">No Telepon : {{ $supplier['phone'] }}
                                                            </p>
                                                            <p class="py-2">Email : {{ $supplier['email'] }}</p>
                                                            <p class="py-2">Tanggal Dibuat :
                                                                {{ $supplier['created_at'] }}
                                                            </p>
                                                            <p class="py-2">Tanggal Diupdate :
                                                                {{ $supplier['updated_at'] }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="text-xl tracking-wide text-black capitalize p-1 transition-colors duration-200 transform rounded-sm">
                                                        <button @click="detailOpen = false">X</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>
</x-app-layout>
