<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PetugasController extends Controller
{
    public function index(): View
    {
        $data = User::latest()->paginate(5);
        return view('admin.data-petugas', compact('data'));
    }

    public function store(Request $request): RedirectResponse
    {
        //validasi form
        $this->validate($request, [
            'name'     => 'required|min:3',
            'email'     => 'required|unique:users|email',
            'password'   => 'required|min:8',
            'alamat'   => 'required|min:30'
        ]);

        User::create([
            'name'     => $request->name,
            'email'     => $request->email,
            'password'   => $request->password,
            'alamat'   => $request->alamat,
        ]);

        //redirect to index
        return redirect()->route('data-petugas.index')->with(['success' => 'Data Petugas Berhasil Ditambahkan!']);
    }

    public function edit(string $id): View
    {
        //get post by id
        $user = User::findOrFail($id);
        return view('admin.data-petugas-update', compact('user'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validasi form
        $this->validate($request, [
            'name'     => 'required|min:3',
            'email'     => 'required|email|unique:users,email,'.$id, //biar email unique bisa diupdate
            'alamat'   => 'required|min:30'
        ]);

        //get post by id
        $user = User::find($id);

        // update berdasarkan id
        $user->update([
            'name'     => $request->name,
            'email'     => $request->email,
            'password'   => $request->password,
            'alamat'   => $request->alamat,
        ]);

        //redirect to index
        return redirect()->route('data-petugas.index')->with(['success' => 'Data PetugasBerhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        //menagmbil id
        $data = User::findOrFail($id);

        //hapus berdasarkan id
        $data->delete();

        //redirect to index
        return redirect()->route('data-petugas.index')->with(['success' => 'Data Petugas Berhasil Dihapus!']);
    }

    public function search(Request $request){
        $keyword = $request->input('name');

        // cari berdasarakn keyword 
        $data = User::where('name', 'like', "%$keyword%")->latest()->paginate(5);
        return view('admin.data-petugas', compact('data'));
    }
}
