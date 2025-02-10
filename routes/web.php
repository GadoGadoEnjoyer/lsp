<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[UserController::class,'showlogin'])->name('login');
Route::get('/register',[UserController::class,'showRegister']);
Route::post('/login',[UserController::class,'login']);
Route::get('/register',[UserController::class,'register']);
Route::get('/admin/login',[UserController::class,'showloginAdmin']);
Route::middleware('logged')->group(function(){
    Route::get('/', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/buku', [BukuController::class, 'showBukuDashboard'])->name('dashboard-buku');
    Route::get('/buku/{id}',[BukuController::class, 'showSpecificBuku'])->name('specific-buku');
    Route::get('/buku/pinjam/{id}',[TransaksiController::class, 'showBorrowBook']);
    Route::post('/buku/pinjam/{id}',[TransaksiController::class, 'borrowBook']);
    Route::get('/buku/kembalikan',[TransaksiController::class, 'showBorrowedBook']);
    Route::get('/buku/kembalikan/{id}',[TransaksiController::class, 'showSpecificBorrowedBook']);
    Route::post('/buku/kembalikan/{id}',[TransaksiController::class, 'returnBook']);
});
Route::middleware('admin')->group(function(){
    Route::get('/admin/dashboard', [BukuController::class, 'adminDashboard'])->name('admin-dashboard');
    Route::get('/admin/buku/buat',[BukuController::class, 'showCreateBuku']);
    Route::post('/admin/buku/buat',[BukuController::class, 'createBuku']);
    Route::get('/admin/buku',[BukuController::class, 'showBuku'])->name('show-buku');
    Route::get('/admin/buku/{id}',[BukuController::class, 'showSpecificBuku']);
    Route::get('/admin/buku/update/{id}',[BukuController::class, 'showUpdateBuku']);
    Route::patch('/admin/buku/update/{id}',[BukuController::class, 'updateBuku']);
    Route::get('/admin/buku/hapus/{id}',[BukuController::class, 'showDeleteBuku']);
    Route::delete('/admin/buku/hapus/{id}',[BukuController::class, 'deleteBuku']);

    Route::get('/admin/user/buat',[UserController::class,'showCreateSiswa']);
    Route::post('/admin/user/buat',[UserController::class,'createSiswa']);
    Route::get('/admin/user',[UserController::class,'showSiswa'])->name('admin-siswa');
    Route::get('/admin/user/{id}',[UserController::class,'showSpecificSiswa'])->name('siswa-specific');
    Route::get('/admin/user/update/{id}',[UserController::class,'showUpdateSiswa']);
    Route::patch('/admin/user/update/{id}',[UserController::class,'updateSiswa']);
    Route::get('/admin/user/hapus/{id}',[UserController::class,'showDeleteSiswa']);
    Route::delete('/admin/user/hapus/{id}',[UserController::class,'deleteSiswa']);

    Route::get('/admin/transaksi/buat',[TransaksiController::class,'showCreateTransaksi']);
    Route::post('/admin/transaksi/buat',[TransaksiController::class,'createTransaksi']);
    Route::get('/admin/transaksi',[TransaksiController::class,'showTransaksi'])->name('admin-transaksi');
    Route::get('/admin/transaksi/{id}',[TransaksiController::class,'showSpecificTransaksi'])->name('specific-transaksi');
    Route::get('/admin/transaksi/update/{id}',[TransaksiController::class,'showUpdateTransaksi']);
    Route::patch('/admin/transaksi/update/{id}',[TransaksiController::class,'updateTransaksi']);
    Route::get('/admin/transaksi/hapus/{id}',[TransaksiController::class,'showDeleteTransaksi']);
    Route::delete('/admin/transaksi/hapus/{id}',[TransaksiController::class,'deleteTransaksi']);
});
