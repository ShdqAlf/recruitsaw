<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LowonganController;
use App\Http\Controllers\Admin\DataPelamarController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;


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
        if ($role === 'Admin') {
            return redirect()->route('dashboard');
        } elseif ($role === 'User') {
            return redirect()->route('user.dashboard');
        }
    }
    // Redirect ke method index di LandingPageController jika belum login
    return app(LandingPageController::class)->index();
})->name('welcome');

// Rute login dan register (bisa diakses oleh guest)
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'register'])->name('register.submit');


// Rute logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/perform-logout', [AuthController::class, 'logout'])->name('logout');

// Rute yang bisa diakses oleh admin dan user tanpa middleware role
Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/manage/jobs', [LowonganController::class, 'index'])->name('manage.jobs');
Route::get('/manage/applicants', [DataPelamarController::class, 'index'])->name('manage.applicants');
Route::get('/manage/interviews', [JadwalController::class, 'index'])->name('manage.interviews');
Route::resource('lowongans', LowonganController::class);
Route::get('/pelamars/{id}/evaluate', [DataPelamarController::class, 'evaluate'])->name('pelamars.evaluate');
Route::post('/pelamars/{id}/confirm', [DataPelamarController::class, 'confirm'])->name('pelamars.confirm');

// Rute dashboard untuk user
Route::get('/user/dashboard', function () {
    return view('user.dashboard'); // Pastikan view 'user.dashboard' ada
})->name('user.dashboard');
