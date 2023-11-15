<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bahan;
use App\Models\Kadaluarsa;
use App\Models\BahanKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BahanKeluarController extends Controller
{
    public function index()
    {
        $kodeBahan = Bahan::get();
        return view('petugas.bahan-keluar', compact('kodeBahan'));
    }

    public function store(Request $request)
    {
        $bahan = Bahan::where('kode_bahan', $request->kode_bahan)->first();
        $user = Auth::user();
        $jumlahBahan = $bahan->jumlah_bahan;
        $requestJumlahBahan = $request->jumlah_bahan;

        // validasi form
        $this->validate($request, [
            'kode_bahan' => 'required',
            'jumlah_bahan' => 'required|numeric',
            'alasan' => 'required|min:20',
        ]);

        BahanKeluar::create([
            'kode_bahan' => $request->kode_bahan,
            'jumlah_bahan' => $requestJumlahBahan,
            'nama_petugas' => $user->name,
            'nama_bahan' => $bahan->nama_bahan,
            'alasan' => $request->alasan,
            'tanggal_keluar' => Carbon::now(),
        ]);

        try {
            if ($requestJumlahBahan <= $jumlahBahan) {
                $bahan->update([ // update jumlah_bahan dengan hasil pengurangan
                    'jumlah_bahan' => ($jumlahBahan) - ($requestJumlahBahan),
                ]);
            } else {
                return redirect()->route('bahan-keluar')->with(['kelebihan' => 'Stok Bahan Kurang Dari Jumlah Bahan']);
            }
        } catch (\Throwable $th) {
            throw $th;
        }

        $bahanKadaluarsaRows = Kadaluarsa::where('bahan_id', $bahan->id)->where('jumlah_pantau', '>', 0)->get();

        // diulang berdasarakn jumlah row dengan bahan_id yang sama
        foreach ($bahanKadaluarsaRows as $row) {

            // isi dengan hasil kurang jumlah_pantau di kadaluarsa dengan requestJumlahBahan atau sisaBahan dari pengkondisian di bawah
            $sisaBahan = $row->jumlah_pantau - $requestJumlahBahan;

            if ($sisaBahan >= 0) {

                // simpan sisanya ke database
                $row->jumlah_pantau = $sisaBahan;
                $row->save();

                // kembali ke perulangan dan lanjutkan perulangan
                break;
            } else {

                // timpa dengan sisa bahan dan ubah jadi positif
                $requestJumlahBahan = abs($sisaBahan);

                // set 0 karena jika ke perkondisian ini pasti mines atau 0 artinya diambil semua 
                $row->jumlah_pantau = 0;
                $row->save();
            }
        }

        // Menghapus semua row yang memiliki jumlah_bahan_kadaluarsa == 0
        Kadaluarsa::where('bahan_id', $bahan->id)->where('jumlah_pantau', 0)->delete();
        
        return redirect()->route('bahan-keluar')->with(['success' => 'Bahan Berhasil Masuk!']);
    }

    public function getNamaJumlahBahan($kodeBahan)
    {
        $bahan = Bahan::where('kode_bahan', $kodeBahan)->first();

        // ambil jumlah bahan dari relasi table jumlah bahan 
        $jumlahBahan = $bahan->jumlah_bahan;
        $namaBahan = $bahan->nama_bahan;

        // kirim dengan json
        return response()->json(['nama_bahan' => $namaBahan, 'jumlah_bahan' => $jumlahBahan]);
    }


}
