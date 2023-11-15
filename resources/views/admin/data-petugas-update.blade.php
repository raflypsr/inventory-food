<x-app-layout>
    <x-slot name="title">
        {{ __('Data-Petugas') }}
    </x-slot>

    <x-slot name="header">
        {{ __('Data Petugas Update') }}
    </x-slot>

    <x-slot name="slot">

        <form class="mt-5 w-11/12 mx-auto" action="{{ route('data-petugas.update', $user->id) }}" method="post"
            x-data="{ alamat: ' {{ old('alamat', $user->alamat) }}' }">
            @csrf
            @method('PUT')
            <div>
                <x-input-label>{{ __('Nama') }}</x-input-label>
                <input placeholder="Nama" type="text" value="{{ old('name', $user->name) }}" name="name"
                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"
                    required>
                @error('name')
                    <div class="text-red-500 mb-2 text-sm" x-init="modelOpen = true">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mt-4">
                <x-input-label>{{ __('Email') }}</x-input-label>
                <input placeholder="Email" type="email" required value="{{ old('email', $user->email) }}" name="email"
                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                @error('email')
                    <div class="text-red-500 mb-2 text-sm" x-init="modelOpen = true">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <input type="hidden" name="password" value="{{ $user->password }}">

            <div class="mt-4">
                <x-input-label>{{ __('Alamat') }}</x-input-label>
                <textarea x-model="alamat" required placeholder="Alamat : Masukan Lebih Dari 30 Kata" type="text" name="alamat"
                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"></textarea>

                <small x-show="alamat.length > 0 && alamat.length < 30" x-text="alamat.length"
                    class="text-red-500"></small>
                <small x-show="alamat.length > 29" x-text="alamat.length" class="text-green-500"></small>
                @error('alamat')
                    <div class="text-red-500 mb-2 text-sm" x-init="modelOpen = true">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="flex justify-end mt-6">
                <button type="submit" :disabled="alamat.length > 29 ? false : true"
                    :style="alamat.length < 30 ? 'background-color: #135851' :
                        'background-color: #22A699'"
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
