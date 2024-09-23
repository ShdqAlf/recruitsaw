<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LowonganController;
use App\Http\Controllers\Admin\DataPelamarController;
use App\Http\Controllers\Admin\JadwalController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'home']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/manage/jobs', [LowonganController::class, 'index'])->name('manage.jobs');
Route::get('/manage/applicants', [DataPelamarController::class, 'index'])->name('manage.applicants');
Route::get('/manage/interviews', [JadwalController::class, 'index'])->name('manage.interviews');
Route::resource('lowongans', LowonganController::class);
// Route::get('dashboard', function () {
//     return "Selamat datang di dashboard!";
// })->middleware('auth');
