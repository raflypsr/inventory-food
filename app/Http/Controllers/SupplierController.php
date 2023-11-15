<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\BahanSupplier;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::latest()->paginate(5);
        $bahanOption = Bahan::pluck('nama_bahan', 'id');

        return view('petugas.data-supplier', compact(['suppliers', 'bahanOption']));
    }

    public function store(Request $request)
    {
        // validasi form
        $this->validate($request, [
            'name' => 'required|min:3|regex:/^[a-zA-Z ]+$/', //hanya alfabet dan spasi yang tervalidasi
            'email' => 'required|email',
            'options' => 'required',
            'telepon' => 'required|min:10|numeric',
            'alamat' => 'required|min:30|',
        ]);

        Supplier::create([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'phone' => $request->telepon,
        ]);

        // tambahkan data di table pivot
        $supplier = Supplier::latest()->value('id');
        $supplierFind = Supplier::find($supplier);
        $bahan = $request->options;
        $supplierFind->bahan()->sync($bahan);

        return redirect()->route('data-supplier')->with(['success' => 'Supplier Berhasil Ditambahkan!']);
    }

    public function edit(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $bahanOption = Bahan::pluck('nama_bahan', 'id');

        // kirim select bahanOption yang dimiliki oleh suppllier
        $bahanOptionSelected = BahanSupplier::with('bahan')
            ->where('supplier_id', $id)
            ->get()
            ->pluck('bahan.nama_bahan', 'bahan.id');

        return view('petugas.data-supplier-update', compact(['supplier', 'bahanOption', 'bahanOptionSelected']));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3|regex:/^[a-zA-Z ]+$/', //hanya alfabet dan spasi yang tervalidasi
            'email' => 'required|email',
            'phone' => 'required|min:10|numeric',
            'alamat' => 'required|min:30|',
        ]);

        $supplier = Supplier::find($id);

        $supplier->update([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        // tambahakan ulang relasi di table pivot
        $supplier1 = Supplier::find($id);
        $bahan = $request->options;
        $supplier1->bahan()->sync($bahan);

        return redirect()->route('data-supplier')->with(['success' => 'Supplier Berhasil Diupdate']);
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);

        // ambil data relasi juga
        $bahanSupplier = BahanSupplier::where('supplier_id', $id)->firstOrFail();

        // hapus data supplier dan relasinya
        $supplier->delete();
        $bahanSupplier->delete();

        return redirect()->route('data-supplier')->with(['success' => 'Supplier Berhasil Dihapus!']);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('name');

        // cari berdasarakan keyword 
        $suppliers = Supplier::where('name', 'like',  "%" . $keyword . "%")->latest()->paginate(5);

        // kirim opsi data juga 
        $bahanOption = Bahan::pluck('nama_bahan', 'id');

        return view('petugas.data-supplier', compact(['suppliers', 'bahanOption']));
    }
}
