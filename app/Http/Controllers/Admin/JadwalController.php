<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JadwalInterview;

class JadwalController extends Controller
{
    public function index()
    {
        $interviews = JadwalInterview::all();
        return view('admin.interview.interview', compact('interviews'));
    }

    public function create()
    {
        return view('admin.interview.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'applicant_name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|time_format:H:i',
            'location' => 'required|string|max:255',
        ]);

        JadwalInterview::create($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal interview berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $interview = JadwalInterview::findOrFail($id);
        return view('admin.jadwal.edit', compact('interview'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'applicant_name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|time_format:H:i',
            'location' => 'required|string|max:255',
        ]);

        $interview = JadwalInterview::findOrFail($id);
        $interview->update($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal interview berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $interview = JadwalInterview::findOrFail($id);
        $interview->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal interview berhasil dihapus.');
    }
}
