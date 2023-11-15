<x-app-layout>
    <x-slot name="title">
        {{ __('Bahan-Masuk') }}
    </x-slot>

    <x-slot name="header">
        {{ __('Catat Bahan Makanan Masuk') }}
    </x-slot>

    <x-slot name="slot">
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
        <div class="flex flex-row w-full my-3 items-center justify-center" x-data="{ selectedBahan: '', namaBahan: '', namaSupplier: [] }">
            <form class="w-full flex flex-col justify-start sm:items-stretch items-end" method="post"
                action="{{ route('bahan-masuk.store') }}">
                @csrf
                <div class="md:flex md:items-center mb-6 w-8/12 sm:w-full">
                    <div class="md:w-1/4 text-center">
                        <x-input-label>{{ __('Kode Bahan') }}</x-input-label>
                    </div>
                    <div class="w-8/12">
                        <select required name="kode_bahan" x-model="selectedBahan" x-on:change="fetchNamaBahan"
                            class="text-black w-full border px-4 py-2 bg-gray-200 border-gray-200"
                            id="inline-full-name">
                            <option value="" disabled selected>Kode Bahan</option>
                            @foreach ($kodeOption as $value)
                                <option value="{{ $value }}">
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                
                <div class="md:flex md:items-center mb-6 w-8/12 sm:w-full">
                    <div class="md:w-1/4 text-center">
                        <x-input-label>{{ __('Nama Supplier') }}</x-input-label>
                    </div>
                    <div class="w-8/12">
                        <select required name="nama_supplier"
                            class="text-black w-full border px-4 py-2 bg-gray-200 border-gray-200"
                            id="inline-full-name">
                            <option value="" disabled selected>Nama Supplier</option>
                            <template x-for="supplier in namaSupplier" :key="supplier.id">
                                <option x-text="supplier.name" :value="supplier.id"></option>
                            </template>
                        </select>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6 w-8/12 sm:w-full">
                    <div class="md:w-1/4 text-center">
                        <x-input-label>{{ __('Nama Bahan') }}</x-input-label>
                    </div>
                    <div class="w-8/12">
                        <input disabled name="kode_bahan" value="" x-model="namaBahan"
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 leading-tight focus:outline "
                            id="inline-full-name" type="text">
                        @error('kode_bahan')
                            <div class="text-red-500 mb-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="md:flex md:items-center mb-6 w-8/12 sm:w-full">
                    <div class="md:w-1/4 text-center">
                        <x-input-label>{{ __('Jumlah Bahan') }}</x-input-label>
                    </div>
                    <div class="w-8/12">
                        <input required name="jumlah_bahan"
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 leading-tight focus:outline "
                            id="inline-full-name" type="number">
                        @error('jumlah_bahan')
                            <div class="text-red-500 mb-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <p></p>
                </div>
                <div class="md:flex md:items-center mb-6 w-8/12 sm:w-full">
                    <div class="md:w-1/4 text-center">
                        <x-input-label>{{ __('Harga Total') }}</x-input-label>
                    </div>
                    <div class="w-8/12">
                        <input required name="harga_total"
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 leading-tight focus:outline "
                            id="inline-full-name" type="number">
                        @error('harga_total')
                            <div class="text-red-500 mb-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="md:flex md:items-center justify-end mb-6 px-24">
                    <button type="submit"
                        class="px-3 py-2 flex mx-2 flex-row text-sm tracking-wide text-white capitalize transition-colors duration-200 transform rounded-md "
                        style="background-color: #22A699">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-send" viewBox="0 0 16 16">
                            <path
                                d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                        </svg>
                        <p>Submit</p>
                    </button>
                    <button type="reset"
                        class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform rounded-md "
                        style="background-color: #CD1818">
                        Reset
                    </button>
                </div>
            </form>
        </div>
        <script>
            function fetchNamaBahan() {
                let selectedBahan = this.selectedBahan;
                fetch(`/get-nama-bahan/${selectedBahan}`) // fetching data ajax dari kode_bahan yang dipilih
                    .then(response => response.json())
                    .then(data => {
                        console.log(data.nama_supplier);
                        this.namaBahan = data.nama_bahan; // isi x-data namaBahan
                        this.namaSupplier = data.nama_supplier; // isi x-data namaSupplier
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        </script>
    </x-slot>
</x-app-layout>
