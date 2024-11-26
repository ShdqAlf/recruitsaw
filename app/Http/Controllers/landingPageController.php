<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;

class landingPageController extends Controller
{
    public function index()
    {
        $lowongans = Lowongan::all();
        return view('landingpage', compact('lowongans'));
    }
}
