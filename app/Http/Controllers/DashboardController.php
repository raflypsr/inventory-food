<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Bahan;
use App\Models\Supplier;
use App\Models\BahanMasuk;
use App\Models\BahanKeluar;
use App\Models\Kadaluarsa;

class DashboardController extends Controller
{
    public function index()
    {
        $supplierCount = Supplier::get()->count();
        $bahanCount = Bahan::get()->count();
        $jumlahBahanCount = Bahan::pluck('jumlah_bahan')->sum();
        $petugasCount = User::get()->count() - 1; //dikurang 1 karena admin 1
        $bahanMasukCount = BahanMasuk::pluck('jumlah_bahan')->sum();
        $bahanKeluarCount = BahanKeluar::pluck('jumlah_bahan')->sum();

        // waktu saat ini
        $waktuSaatIni =  Carbon::now();

        $waktuSaatIni->addDay(9); //nambah hari

        $kadaluarsa = Kadaluarsa::get();
        $kadaluarsaId = Kadaluarsa::get()->pluck('id');

        // buat array untuk menyimpan data 
        $dataKadaluarsa = [];
        $dataNamaBahan = [];
        $listKadaluarsa = [];
        $pendingKadaluarsa = [];
        $tanggalDatang = [];
        $jumlahPantau = [];
        $dataSatuan = [];
        $dataId = [];

        foreach ($kadaluarsa as $value) {

            // mengisi array
            $dataNamaBahan[] = $value->bahan->nama_bahan;
            $dataSatuan[] = $value->bahan->satuan;
            $tanggalDatang[] = $value->tanggal_datang;
            $jumlahPantau[] = $value->jumlah_pantau;

            // ubah jadi objek carbon lalu Hitung selisih hari antara created_at dan waktu saat ini 
            // simpelnya sudah berapa hari semenjak bahan datang - masa_kadaluarsa
            $dataKadaluarsa[] = ($value->bahan->masa_kadaluarsa) - (Carbon::parse($value->tanggal_datang)->diffInDays($waktuSaatIni)); // selagi masih mines ga basi
        }

        // kalo mau dibatesin tampil
        // foreach ($dataKadaluarsa as $key => $value) {
        //     if ($value <= 0) {
        //         $listKadaluarsa[] = "$tanggalDatang[$key] | $dataNamaBahan[$key] $jumlahPantau[$key] $dataSatuan[$key] sudah kadaluarsa";
        //         // dd($listKadaluarsa);
        //     } elseif ($value <= 3) {
        //         $pendingKadaluarsa[] = "$tanggalDatang[$key] | $dataNamaBahan[$key] $jumlahPantau[$key] $dataSatuan[$key] kadaluarsa dalam $value ";
        //     }
        // }

        // kalo liat semua tanpa di batesin
        foreach ($dataKadaluarsa as $key => $value) {
            if ($value <= 0) {
                $listKadaluarsa[] = "$tanggalDatang[$key] | $dataNamaBahan[$key] $jumlahPantau[$key] $dataSatuan[$key] sudah kadaluarsa";
                // dd($listKadaluarsa);
            } else {
                $pendingKadaluarsa[] = "$tanggalDatang[$key] | $dataNamaBahan[$key] $jumlahPantau[$key] $dataSatuan[$key] kadaluarsa dalam $value ";
            }
        }

        // dd($kadaluarsaId);

        return view('dashboard', compact(['supplierCount', 'bahanCount', 'jumlahBahanCount', 'petugasCount', 'bahanMasukCount', 'bahanKeluarCount', 'listKadaluarsa', 'pendingKadaluarsa', 'kadaluarsaId']));

    }

    public function destroy($id){
        //get post by ID
        $data = Kadaluarsa::findOrFail($id);
        $bahanId = $data->bahan_id;
        $bahan = Bahan::where('id', $bahanId)->first();
        $hasil =  $bahan->jumlah_bahan - $data->jumlah_pantau;

        // update jumlah bahan saat bahan kadaluarsa di hapus
        $bahan->update([
            'jumlah_bahan' => $hasil,
        ]);

        //delete kadaluarsa
        $data->delete();

        //redirect to index
        return redirect()->route('data-petugas.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
