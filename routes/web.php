<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LowonganController;
use App\Http\Controllers\Admin\DataPelamarController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rute utama (bisa diakses oleh guest, tetapi jika sudah login redirect ke dashboard)
Route::get('/', function () {
    if (Auth::check()) {
        // Redirect ke dashboard berdasarkan role jika sudah login
        $role = auth()->user()->role;
        if ($role === 'admin') {
            return redirect()->route('dashboard');
        } elseif ($role === 'user') {
            return redirect()->route('user.dashboard');
        }
    }
    return view('welcome');
})->name('welcome');

// Rute login dan register (hanya bisa diakses oleh guest)
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);

    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);

    // Rute tambahan jika guest ingin mengakses home (halaman utama)
    Route::get('home', [HomeController::class, 'home'])->name('home');
});

// Rute logout (untuk logout pengguna yang sudah login)
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk admin yang sudah login
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/manage/jobs', [LowonganController::class, 'index'])->name('manage.jobs');
    Route::get('/manage/applicants', [DataPelamarController::class, 'index'])->name('manage.applicants');
    Route::get('/manage/interviews', [JadwalController::class, 'index'])->name('manage.interviews');
    Route::resource('lowongans', LowonganController::class);
});

// Rute untuk user yang sudah login
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard'); // Pastikan view 'user.dashboard' ada
    })->name('user.dashboard');
});
