<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\SiswaController;

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

Route::get('/salam ', function () {
    return "Asalamualaikum, Selamat Belajar Laravel PeTIK Jombang Angkatan III";
});

//Routing parameter
Route::get('/pegawai/{nama}/{divisi}', function ($nama, $divisi) {
    return 'Nama Pegawai :'.$nama.'<br>Departemen : '.$divisi;
});

//Routing View kondisi
Route::get('/kabar', function () {
    return view('kondisi');
});

//Routing View Data Santri
Route::get('/santri', [SantriController::class, 'dataSantri']
);

//Routing View Data Siswa
Route::get('/siswa', [SiswaController::class, 'dataSiswa']
);