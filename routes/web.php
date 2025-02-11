<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;


Route::get('/login',[UserController::class,'showlogin'])->name('login');
Route::get('/register',[UserController::class,'showRegister']);
Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);
Route::get('/admin/login',[UserController::class,'showloginAdmin'])->name('admin-login');
Route::middleware('logged')->group(function(){
    Route::get('/', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/buku', [BukuController::class, 'showBukuDashboard'])->name('dashboard-buku');
    Route::get('/buku/{id}',[BukuController::class, 'showSpecificBuku'])->name('specific-buku');
    Route::get('/buku/pinjam/{id}',[TransaksiController::class, 'showBorrowBook']);
    Route::post('/buku/pinjam/{id}',[TransaksiController::class, 'borrowBook']);
    Route::get('/kembalikan',[TransaksiController::class, 'showBorrowedBook']);
    Route::get('/kembalikan/{id}',[TransaksiController::class, 'showSpecificBorrowedBook']);
    Route::post('/kembalikan/{id}',[TransaksiController::class, 'returnBook']);
});
Route::middleware('admin')->group(function(){
    Route::get('/admin/dashboard', [UserController::class, 'adminDashboard'])->name('admin-dashboard');
    Route::get('/admin/buat/buku',[BukuController::class, 'showCreateBuku']);
    Route::post('/admin/buat/buku',[BukuController::class, 'createBuku']);
    Route::get('/admin/buku',[BukuController::class, 'showBuku'])->name('show-buku');
    Route::get('/admin/buku/{id}',[BukuController::class, 'showSpecificBukuAdmin'])->name('admin-specific-book');
    Route::get('/admin/buku/update/{id}',[BukuController::class, 'showUpdateBuku']);
    Route::patch('/admin/buku/update/{id}',[BukuController::class, 'updateBuku']);
    Route::get('/admin/buku/hapus/{id}',[BukuController::class, 'showDeleteBuku']);
    Route::delete('/admin/buku/hapus/{id}',[BukuController::class, 'deleteBuku']);

    Route::get('/admin/buat/user',[UserController::class,'showCreateSiswa']);
    Route::post('/admin/buat/user',[UserController::class,'createSiswa']);
    Route::get('/admin/user',[UserController::class,'showSiswa'])->name('admin-siswa');
    Route::get('/admin/user/{id}',[UserController::class,'showSpecificSiswa'])->name('siswa-specific');
    Route::get('/admin/user/update/{id}',[UserController::class,'showUpdateSiswa']);
    Route::patch('/admin/user/update/{id}',[UserController::class,'updateSiswa']);
    Route::get('/admin/user/hapus/{id}',[UserController::class,'showDeleteSiswa']);
    Route::delete('/admin/user/hapus/{id}',[UserController::class,'deleteSiswa']);

    Route::get('/admin/buat/transaksi',[TransaksiController::class,'showCreateTransaksi']);
    Route::post('/admin/buat/transaksi',[TransaksiController::class,'createTransaksi']);
    Route::get('/admin/transaksi',[TransaksiController::class,'showTransaksi'])->name('admin-transaksi');
    Route::get('/admin/transaksi/{id}',[TransaksiController::class,'showSpecificTransaksi'])->name('specific-transaksi');
    Route::get('/admin/transaksi/update/{id}',[TransaksiController::class,'showUpdateTransaksi']);
    Route::patch('/admin/transaksi/update/{id}',[TransaksiController::class,'updateTransaksi']);
    Route::get('/admin/transaksi/hapus/{id}',[TransaksiController::class,'showDeleteTransaksi']);
    Route::delete('/admin/transaksi/hapus/{id}',[TransaksiController::class,'deleteTransaksi']);
});
