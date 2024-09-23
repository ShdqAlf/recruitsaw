<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    public function index()
    {
        $lowongans = Lowongan::all();
        return view('admin.kelolalowongankerja.table_loker', compact('lowongans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'perusahaan' => 'required',
            'lokasi' => 'required',
            'tanggal_dibuka' => 'required|date',
            'tanggal_ditutup' => 'required|date',
        ]);

        Lowongan::create($request->all());

        return redirect()->back()->with('success', 'Lowongan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $lowongan = Lowongan::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'perusahaan' => 'required',
            'lokasi' => 'required',
            'tanggal_dibuka' => 'required|date',
            'tanggal_ditutup' => 'required|date',
        ]);

        $lowongan->update($request->all());

        return redirect()->back()->with('success', 'Lowongan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->delete();

        return redirect()->back()->with('success', 'Lowongan berhasil dihapus.');
    }
}
