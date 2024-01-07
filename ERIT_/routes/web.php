<?php

use App\Http\Controllers\duitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registeredUserController;

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


Route::get('/', function () {
    return view('welcome');
});
Route::get('/coba', function () {
    return view('coba');
});

// AUTENTIKASI PENGGUNA
Route::get('/signup', function () {return view('signup');});
Route::post('/signup', [registeredUserController::class, 'store'])->name('user.register');
Route::get('/signin', function () {return view('signin');})->name('signin');
Route::post('/signin', [registeredUserController::class, 'login'])->name('user.login');

// PENGGUNA TERAUTENTIKASI
Route::middleware('auth')->group(function () {
    Route::get('/{url}', [duitController::class, "index"])->where('url', '(dashboard|pemasukan|pengeluaran|tabungan|grafik)')->name('urls');
    Route::post('/pemasukan', [duitController::class, "pemasukanStore"])->name('pemasukan.store');
    Route::delete('/pemasukan/{id}', [duitController::class, "pemasukanDelete"])->name('pemasukan.delete');
    Route::post('/pengeluaran', [duitController::class, "pengeluaranStore"])->name('pengeluaran.store');
    Route::delete('/pengeluaran/{id}', [duitController::class, "pengeluaranDelete"])->name('pengeluaran.delete');
    Route::post('/tabungan', [duitController::class, "tabunganStore"])->name('tabungan.store');
    Route::put('/tabungan/{id}', [duitController::class, "tabunganUpdate"])->name('tabungan.update');
    Route::delete('/tabungan/{id}', [duitController::class, "tabunganDelete"])->name('tabungan.delete');
    Route::get('/profile', [registeredUserController::class, "profile"])->name('profile');
    Route::put('/profile', [registeredUserController::class, "profileEdit"])->name('profile.edit');
    Route::get('/logout', [registeredUserController::class, "logout"])->name('logout');
});