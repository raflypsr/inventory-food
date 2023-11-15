<?php

namespace App\Http\Controllers;

use App\Models\BahanKeluar;
use Illuminate\Http\Request;
use PDF;

class CetakBahanKeluarController extends Controller
{
    public function index()
    {
        $logBahanKeluar = BahanKeluar::latest()->paginate(10);
        return view('admin.cetak-bahan-keluar', compact('logBahanKeluar'));
    }

    public function printPdf(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        // jenis cetak 
        $jenis = "Keluar";

        // Ambil data dari database berdasarkan tanggal awal dan akhir
        $dataKeluar = BahanKeluar::whereBetween('tanggal_keluar', [$tanggalAwal, $tanggalAkhir])->get();

        // Load view yang akan dijadikan sebagai konten PDF
        $pdf = PDF::loadView('admin.cetak-laporan', compact('dataKeluar', 'jenis'));

        // mengatur nama file PDF yang akan diunduh
        $fileName = 'laporan_keluar' . $tanggalAwal . '_to_' . $tanggalAkhir . '.pdf';
        
        // Mengembalikan response PDF untuk diunduh
        return $pdf->stream($fileName);
    }


}
