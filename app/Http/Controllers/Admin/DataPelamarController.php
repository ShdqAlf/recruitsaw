<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataPelamarController extends Controller
{
    public function index()
    {
        return view('admin.pelamar.index'); // Buat view sesuai dengan halaman yang Anda inginkan
    }
}
