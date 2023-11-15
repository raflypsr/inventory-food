<x-app-layout>
    <x-slot name="title">
        {{ __('Cetak Bahan Keluar') }}
    </x-slot>

    <x-slot name="header">
        {{ __('Cetak Bahan Keluar') }}
    </x-slot>
    <x-slot name="slot">
        <form action="{{ route('cetak-keluar-pdf') }}" class="flex flex-col sm:flex-row  items-center justify-center w-full pb-5">
            <div class="text-center mx-2">
                <x-input-label>{{ __('Tanggal Awal') }}</x-input-label>
                <input type="date" class="rounded-lg" name="tanggal_awal" required>
            </div>
            <div class="text-center mx-2 my-2">
                <x-input-label>{{ __('Tanggal Akhir') }}</x-input-label>
                <input type="date" class="rounded-lg" name="tanggal_akhir" required>
            </div>
            <x-print-out>Print Out</x-print-out>
        </form>

        <div class="overflow-x-auto sm:w-full w-2/3 sm:ml-0 ml-20">
            <table class="border-collapse border border-slate-400 container mx-auto w-10/12">
                <thead>
                    <tr style="background-color: #116D6E" class="text-white">
                        <th class="border border-neutral-900 p-2">No</th>
                        <th class="border border-neutral-900 p-2">Nama Bahan</th>
                        <th class="border border-neutral-900 p-2">Jumlah Bahan</th>
                        <th class="border border-neutral-900 p-2">Petugas</th>
                        <th class="border border-neutral-900 p-2">Alasan</th>
                        <th class="border border-neutral-900 p-2">Tanggal Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logBahanKeluar as $item)
                        <tr class="text-center">
                            <td class="border border-neutral-900">{{ $loop->iteration }}</td>
                            <td class="border border-neutral-900">{{ $item->nama_bahan }}</td>
                            <td class="border border-neutral-900">{{ $item->jumlah_bahan }}</td>
                            <td class="border border-neutral-900">{{ $item->nama_petugas }}</td>
                            <td class="border border-neutral-900">{{ $item->alasan }}</td>
                            <td class="border border-neutral-900">{{ $item->tanggal_keluar }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex justify-center py-3 ">
                {{ $logBahanKeluar->links() }}
            </div>
        </div>
    </x-slot>
</x-app-layout>
