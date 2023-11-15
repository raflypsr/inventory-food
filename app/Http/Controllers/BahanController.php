<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class BahanController extends Controller
{
    public function index()
    {
        $bahan = Bahan::latest()->paginate(5);
        return view('petugas.data-bahan', compact('bahan'));
    }

    public function store(Request $request): RedirectResponse
    {
        // validasi form
        $this->validate($request, [
            'nama_bahan' => 'required|min:3|unique:bahans|regex:/^[a-zA-Z ]+$/', //hanya alfabet dan spasi yang tervalidasi
            'masa_kadaluarsa' => 'required|numeric',
            'satuan' => 'required|regex:/^[a-zA-Z ]+$/', //hanya alfabet dan spasi yang tervalidasi
            'jumlah_minimal' => 'required|numeric',
        ]);

        Bahan::create([
            'nama_bahan' => $request->nama_bahan,
            'jumlah_minimal' => $request->jumlah_minimal,
            'masa_kadaluarsa' => $request->masa_kadaluarsa,
            'satuan' => $request->satuan,
        ]);

        return redirect()->route('data-bahan')->with(['success' => 'Jenis Bahan Berhasil Ditambahkan']);
    }

    public function edit(string $id)
    {
        $bahan = Bahan::findOrFail($id);
        return view('petugas.data-bahan-update', compact('bahan'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_bahan' => 'required|min:3|regex:/^[a-zA-Z ]+$/|unique:bahans,nama_bahan,' . $id, // validasi unique nama_bahan dan nama_bahan boleh nimpa jika update adalah nama_bahan saat ini
            'masa_kadaluarsa' => 'required|numeric',
            'satuan' => 'required|regex:/^[a-zA-Z ]+$/', //hanya alfabet dan spasi yang tervalidasi
            'jumlah_minimal' => 'required|numeric',
        ]);
        $bahan = Bahan::find($id);

        $bahan->update([
            'nama_bahan' => $request->nama_bahan,
            'masa_kadaluarsa' => $request->masa_kadaluarsa,
            'satuan' => $request->satuan,
            'jumlah_minimal' => $request->jumlah_minimal,
        ]);

        return redirect()->route('data-bahan')->with(['success' => 'Jenis Bahan Berhasil Diupdate']);
    }

    public function destroy($id): RedirectResponse
    {
        $bahan = Bahan::findOrFail($id);
        $bahan->delete();

        return redirect()->route('data-bahan')->with(['success' => 'Jenis Bahan Berhasil Dihapus!']);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('nama_bahan');

        // cari berdasarkan keyword
        $bahan = Bahan::where('nama_bahan', 'like',  "%" . $keyword . "%")->latest()->paginate(5);
        return view('petugas.data-bahan', compact('bahan'));
    }
}
