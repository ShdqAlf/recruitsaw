<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        return view('admin.jadwal.index'); // Buat view sesuai dengan halaman yang Anda inginkan
    }
}
