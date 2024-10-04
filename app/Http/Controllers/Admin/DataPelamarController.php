<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelamar; // Pastikan model Pelamar sudah dibuat

class DataPelamarController extends Controller
{
    public function index()
    {
        $pelamars = Pelamar::all(); // Mengambil semua data pelamar
        return view('admin.kelolapelamar.table_pelamar', compact('pelamars'));
    }

    public function show($id)
    {
        $pelamar = Pelamar::findOrFail($id);
        return view('admin.kelolapelamar.detail_pelamar', compact('pelamar'));
    }


    public function edit($id)
    {
        $pelamar = Pelamar::findOrFail($id);
        return view('admin.pelamars.edit', compact('pelamar'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status_lamaran' => 'required',
        ]);
        $pelamar = Pelamar::findOrFail($id);
        $pelamar->update($request->all());
        return redirect()->route('pelamars.index')->with('success', 'Status pelamar berhasil diperbarui.');
    }

    public function evaluate($id)
{
    $pelamar = Pelamar::findOrFail($id);
    return view('admin.kelolapelamar.penilaian_pelamar', compact('pelamar'));
}

    // Fungsi untuk mengonfirmasi status pelamar
    public function confirm(Request $request, $id)
    {
        $pelamar = Pelamar::findOrFail($id);
        $pelamar->status_lamaran = $request->input('status_lamaran');
        $pelamar->save();
        return back()->with('success', 'Status pelamar berhasil dikonfirmasi.');
    }
}
