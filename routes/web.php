<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\KembaliController;
use App\Http\Controllers\ReportController;
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
Route::get('/', [HomeController::class, 'index']);
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('users', UserController::class); //users.index, users.create, users.edit, users.update, users.destroy
Route::resource('anggotas', AnggotaController::class); //users.index, users.create, users.edit, users.update, users.destroy
Route::get('anggota/showall', [AnggotaController::class, 'showAll'])->name('anggota.all');

Route::resource('koleksis', KoleksiController::class); //users.index, users.create, users.edit, users.update, users.destroy
Route::get('koleksi/showall', [KoleksiController::class, 'showAll'])->name('koleksi.all');
Route::resource('pinjams', PinjamController::class); //users.index, users.create, users.edit, users.update, users.destroy
Route::resource('kembalis', KembaliController::class); //users.index, users.create, users.edit, users.update, users.destroy

Route::get('ports/users', [ReportController::class, 'ReportUser'])->name('users');
Route::get('ports/anggotas', [ReportController::class, 'ReportAnggota'])->name('anggotas');
Route::get('ports/koleksis', [ReportController::class, 'ReportKoleksi'])->name('koleksis');
Route::get('ports/peminjaman', [ReportController::class, 'ReportPemijaman'])->name('peminjaman');
Route::get('ports/pengembalian', [ReportController::class, 'ReportPengembalian'])->name('pengembalian');
