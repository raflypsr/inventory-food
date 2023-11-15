<x-app-layout>
    <x-slot name="title">
        {{ __('Catat-Bahan-Keluar') }}
    </x-slot>

    <x-slot name="header">
        {{ __('Catat Bahan Keluar') }}
    </x-slot>

    <x-slot name="slot">
        @if (session('success') || session('kelebihan'))
            @if (session('success'))
                <div style="background-color: rgba(59, 187, 174, 0.474)"
                    class="mb-4 rounded-md border border-cyan-400 px-6 py-2 text-cyan-900 text-base w-1/2 mx-24"
                    role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('kelebihan'))
                <div class="mb-4 rounded-md border bg-red-300 border-red-400 px-6 py-2 text-cyan-900 text-base w-1/2 mx-24"
                    role="alert">
                    {{ session('kelebihan') }}
                </div>
            @endif
        @else
            <div class="mb-4 rounded-md px-6 py-2 text-cyan-900 text-base w-1/2 mx-24" role="alert">
            </div>
        @endif
        <div class="flex flex-row w-full my-3 items-center justify-center" x-data="{ selectedBahan: '', namaBahan: '', jumlahBahan: '' }">
            <form class="w-full flex flex-col justify-start sm:items-stretch items-end" x-data="{ alasan: '' }"
                method="post">
                @csrf
                <div class="md:flex md:items-center mb-4 w-8/12 sm:w-full">
                    <div class="md:w-1/4 text-center">
                        <x-input-label>{{ __('Kode Bahan') }}</x-input-label>
                    </div>
                    <div class="w-8/12">
                        {{-- benerin seprti semula jangan ada warna dll --}}
                        <select required name="kode_bahan" x-model="selectedBahan" x-on:change="fetchNamaJumlahBahan"
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 leading-tight focus:outline "
                            id="inline-full-name">
                            <option value="" disabled selected>Pilih Kode</option>
                            @foreach ($kodeBahan as $value)
                                {{-- // ganti jadi jumlah minimal berdasarkan jenis bahan --}}
                                <option value="{{ $value->kode_bahan }}"
                                    class="@if ($value->jumlah_bahan == 0) bg-gray-300 @elseif($value->jumlah_bahan <= $value->jumlah_minimal) bg-red-100 @endif"
                                    @if ($value->jumlah_bahan == 0) disabled @endif>
                                        {{ $value->kode_bahan }}
                                    @if ($value->jumlah_bahan == 0)
                                        (Stock Habis)
                                    @elseif ($value->jumlah_bahan <= $value->jumlah_minimal)
                                        (Stock Sedikit)
                                    @endif
                                </option>
                            @endforeach
                        </select>
                        @error('kode_bahan')
                            <div class="text-red-500 mb-2 text-sm" x-init="modelOpen = true">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="md:flex md:items-center mb-4 w-8/12 sm:w-full">
                    <div class="md:w-1/4 text-center">
                        <x-input-label>{{ __('Nama Bahan') }}</x-input-label>
                    </div>
                    <div class="w-8/12">
                        <input required value="" x-model="namaBahan" readonly name="nama_bahan"
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 leading-tight focus:outline-none focus:bg-white"
                            id="inline-full-name" type="text">
                        @error('nama_bahan')
                            <div class="text-red-500 mb-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="md:flex md:items-center mb-4 w-8/12 sm:w-full">
                    <div class="md:w-1/4 text-center">
                         <x-input-label>{{ __('Stok Sekarang') }}</x-input-label>
                    </div>
                    <div class="w-8/12">
                        <input required :value="jumlahBahan" readonly
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 leading-tight focus:outline-none focus:bg-white"
                            id="inline-full-name" type="text">
                    </div>
                </div>
                <div class="md:flex md:items-center mb-4 w-8/12 sm:w-full">
                    <div class="md:w-1/4 text-center">
                         <x-input-label>{{ __('Jumlah Bahan Pakai') }}</x-input-label>
                    </div>
                    <div class="w-8/12">
                        <input required name="jumlah_bahan" placeholder="Masukan kurang dari stock bahan"
                            class="bg-gray-200 appearance-none text-red-500border-2 border-gray-200 rounded w-full py-2 px-4 leading-tight focus:outline-none focus:bg-white"
                            id="inline-full-name" type="number">
                        @error('jumlah_bahan')
                            <div class="text-red-500 mb-2 text-sm" x-init="modelOpen = true">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="md:flex md:items-center mb-4 w-8/12 sm:w-full">
                    <div class="md:w-1/4 text-center">
                         <x-input-label>{{ __('Alasan') }}</x-input-label>
                    </div>
                    <div class="w-8/12">
                        <textarea x-model="alasan" placeholder="Masukan Lebih Dari 20 Kata" required name="alasan"
                            class="bg-gray-200  appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 leading-tight focus:outline-none focus:bg-white"
                            type="text"></textarea>
                        @error('alasan')
                            <div class="text-red-500 mb-2 text-sm" x-init="modelOpen = true">
                                {{ $message }}
                            </div>
                        @enderror
                        <small x-show="alasan.length > 0 && alasan.length < 20" x-text="alasan.length"
                            class="text-red-500"></small>
                        <small x-show="alasan.length > 19" x-text="alasan.length" class="text-green-500"></small>
                    </div>
                </div>
                <div class="md:flex md:items-center justify-end mb-6 px-24">
                    <button type="submit" :disabled="alasan.length > 19 ? false : true"
                        :style="alasan.length < 20 ? 'background-color: #135851' : 'background-color: #22A699'"
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
            function fetchNamaJumlahBahan() {
                let selectedBahan = this.selectedBahan;
                fetch(`/get-nama-jumlah-bahan/${selectedBahan}`) // fetching data ajax dari kode_bahan yang dipilih
                    .then(response => response.json())
                    .then(data => {
                        this.namaBahan = data.nama_bahan; // isi x-data namaBahan
                        this.jumlahBahan = data.jumlah_bahan; // isi x-data namaBahan
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        </script>
    </x-slot>
</x-app-layout>
