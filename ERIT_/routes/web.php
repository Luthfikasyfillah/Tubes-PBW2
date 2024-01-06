<?php

use Illuminate\Support\Facades\Route;

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

    Route::get('/users', [registeredUserController::class, 'index']);
    Route::get('/usersRegistration', [registeredUserController::class, 'create']);
    Route::post('/usersStore', [registeredUserController::class, 'store']);

Route::get('/login', function () {
    return view('login');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/SignUp', function () {
    return view('SignUp');
});
Route::get('/sidebar', function () {
    return view('layout/sidebar');
});
Route::get('/resetPassword', function () {
    return view('resetPassword');
});
Route::get('/editProfil', function () {
    return view('editProfil');
});
Route::get('/pengeluaran', function () {
    return view('pengeluaran');
});
Route::get('/tabungan', function () {
    return view('tabungan');
});
Route::get('/grafik', function () {
    return view('grafik');
});