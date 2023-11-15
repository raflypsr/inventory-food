<x-app-layout>
    <x-slot name="title">
        {{ __('Data-Bahan') }}
    </x-slot>

    <x-slot name="header">
        {{ __('Data Bahan Update') }}
    </x-slot>

    <x-slot name="slot">

        <form class="mt-5 w-11/12 mx-auto" action="{{ route('data-bahan.update', $bahan->id) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <label for="">Nama Bahan</label>
                <input placeholder="Nama Bahan" type="text" value="{{ old('nama_bahan', $bahan->nama_bahan) }}" name="nama_bahan"
                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"
                    required>
                @error('nama_bahan')
                    <div class="text-red-500 mb-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mt-4">
                <label for="">Masa Kadaluarsa</label>
                <input placeholder="Masa Kadaluarsa" type="number" required value="{{ old('masa_kadaluarsa', $bahan->masa_kadaluarsa) }}"
                    name="masa_kadaluarsa"
                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                @error('masa_kadaluarsa')
                    <div class="text-red-500 mb-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            

            <div class="mt-4">
                <label for="">Satuan</label>
                <input placeholder="satuan" type="text" required value="{{ old('satuan', $bahan->satuan) }}"
                    name="satuan"
                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                @error('satuan')
                    <div class="text-red-500 mb-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="mt-4">
                <label for="">Jumlah Minimal</label>
                <input placeholder="satuan" type="text" required value="{{ old('jumlah_minimal', $bahan->jumlah_minimal) }}"
                    name="jumlah_minimal"
                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                @error('jumlah_minimal')
                    <div class="text-red-500 mb-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="flex justify-end mt-6">
                <button type="submit"
                    class="px-3 py-2 mx-2 flex flex-row text-sm tracking-wide text-white capitalize transition-colors duration-200 transform rounded-md "
                    style="background-color: #22A699">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-send" viewBox="0 0 16 16">
                        <path
                            d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                    </svg>
                    <p>Submit</p>
                </button>
            </div>
        </form>
    </x-slot>
</x-app-layout>
