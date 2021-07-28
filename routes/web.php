<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransaksiHutangController;
use App\Http\Controllers\TransaksiPiutangController;
use App\Http\Controllers\HistoryHutangController;
use App\Http\Controllers\HistoryPiutangController;
use App\Http\Controllers\TemanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CatatanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/home', [HomeController::class, 'index']);
Route::get('/', [LandingController::class, 'landing']);

// Route::get('/bayar/hutang', [BayarHutangController::class, 'index']);
// Route::get('/home', [HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Profil
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::post('/profil/update', [ProfilController::class, 'update']);
Route::post('/profil/ganti-password', [ProfilController::class, 'gantiPassword']);


Route::group(['middleware' => 'admin'], function () {
    // User
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::post('/user/reset-password', [UserController::class, 'resetPassword']);
    Route::post('/user/hapus-akun', [UserController::class, 'hapusAkun']);
});

Route::group(['middleware' => 'user'], function () {
    // hutang
    Route::get('/transaksi/hutang', [TransaksiHutangController::class, 'index'])->name('transaksiHutang');
    Route::get('/transaksi/bayar-hutang/{id}', [TransaksiHutangController::class, 'bayarHutang']);
    Route::post('/transaksi/bayar-hutang/update/{id}', [TransaksiHutangController::class, 'update']);

    // piutang
    Route::get('/transaksi/piutang', [TransaksiPiutangController::class, 'index'])->name('transaksiPiutang');
    Route::get('/transaksi/tambah-piutang', [TransaksiPiutangController::class, 'tambahPiutang']);
    Route::get('/transaksi/ubah-piutang/{id}', [TransaksiPiutangController::class, 'ubahPiutang']);
    Route::get('/transaksi/hapus-piutang/{id}', [TransaksiPiutangController::class, 'hapusPiutang']);
    Route::post('/transaksi/piutang/insert', [TransaksiPiutangController::class, 'insert']);
    Route::post('/transaksi/piutang/update/{id}', [TransaksiPiutangController::class, 'update']);
    Route::post('/transaksi/piutang/confirm/{id_piutang}', [TransaksiPiutangController::class, 'confirm']);

    // history
    Route::get('/history/hutang', [HistoryHutangController::class, 'index']);
    Route::get('/history/piutang', [HistoryPiutangController::class, 'index']);

    // teman 
    Route::get('/teman', [TemanController::class, 'index'])->name('teman');
    Route::get('/teman/permintaan', [TemanController::class, 'permintaan']);
    Route::get('/teman/tambah-teman', [TemanController::class, 'tambahTeman']);
    Route::post('/teman/insert-notifikasi', [TemanController::class, 'insertNotifikasi']);
    Route::post('/teman/insert-teman', [TemanController::class, 'insertTeman']);

    // catatan pribadi
    Route::get('/catatan', [CatatanController::class, 'index'])->name('catatan');
    Route::get('/catatan/tambah-catatan', [CatatanController::class, 'tambahCatatan']);
    Route::post('/catatan/insert', [CatatanController::class, 'insert']);
});
