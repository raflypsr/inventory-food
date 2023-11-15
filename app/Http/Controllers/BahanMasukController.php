<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bahan;
use App\Models\Supplier;
use App\Models\BahanMasuk;
use App\Models\Kadaluarsa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BahanMasukController extends Controller
{
    public function index()
    {
        $kodeOption = Bahan::pluck('kode_bahan', 'id');
        $namaSupplier = Supplier::pluck('name');
        return view('petugas.bahan-masuk', compact(['kodeOption', 'namaSupplier']));
    }

    public function store(Request $request)
    {   
        // dd($request->all());
        $user = Auth::user();
        $bahan = Bahan::where('kode_bahan', $request->kode_bahan)->first();

        $this->validate($request, [
            'jumlah_bahan' => 'required|numeric',
            'harga_total' => 'required|numeric',
            'kode_bahan' => 'required',
        ]);

        BahanMasuk::create([
            'jumlah_bahan' => $request->jumlah_bahan,
            'kode_bahan' =>  $request->kode_bahan,
            'harga_total' => $request->harga_total,
            'nama_petugas' => $user->name,
            'nama_bahan' => $bahan->nama_bahan,
            'nama_supplier' => $request->nama_supplier,
            'tanggal_datang' => Carbon::now(),
        ]);

        Kadaluarsa::create([
            'tanggal_datang' => Carbon::now(),
            'jumlah_pantau' => $request->jumlah_bahan,
            'bahan_id' => $bahan->id,
        ]);

        try {
            $bahan->update([
                //tambahakan jumlah jumlah_bahan di tabel jumlah bahan
                'jumlah_bahan' => ($bahan->jumlah_bahan) + ($request->jumlah_bahan), 
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->route('bahan-masuk')->with(['success' => 'Bahan Berhasil Masuk!']);
    }

    public function getNamaBahan($kodeBahan)
    {
        
        $bahanMasuk = Bahan::where('kode_bahan', $kodeBahan)->first();

        // ambil jumlah bahan dari relasi table jumlah bahan 
        $namaBahan = $bahanMasuk->nama_bahan;

        $supplier = $bahanMasuk->suppliers;

        // kirim dengan json
        return response()->json(['nama_bahan' => $namaBahan, 'nama_supplier' => $supplier]);
    }

}


