<?php

namespace App\Http\Controllers;

use App\Models\BahanMasuk;
use Illuminate\Http\Request;
use PDF;

class CetakBahanMasukController extends Controller
{
    public function index()
    {
        $logBahanMasuk = BahanMasuk::latest()->paginate(10);
        return view('admin.cetak-bahan-masuk', compact('logBahanMasuk'));
    }

    public function printPdf(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        // jenis cetak
        $jenis = "Masuk";

        // Ambil data dari database berdasarkan tanggal awal dan akhir
        $dataMasuk = BahanMasuk::whereBetween('tanggal_datang', [$tanggalAwal, $tanggalAkhir])->get();

        // Load view yang akan dijadikan sebagai konten PDF
        $pdf = PDF::loadView('admin.cetak-laporan', compact('dataMasuk', 'jenis'));

        // mengatur nama file PDF yang akan diunduh
        $fileName = 'laporan_masuk' . $tanggalAwal . '_to_' . $tanggalAkhir . '.pdf';
        
        // Mengembalikan response PDF untuk diunduh
        return $pdf->stream($fileName);
    }
}
