<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AnggotaController;

use App\Http\Controllers\PengarangController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;

use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasantriController;
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

//Pertemuan 3
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
//Akhir Pertemuan 3

//Tugas 3
//Routing View Data Siswa
Route::get('/siswa', [SiswaController::class, 'dataSiswa']
);
//Akhir Tugas 3

//Pertemuan 4
//Routing View hello
Route::get('/hello', function () {
    return view('hello',['name' => 'Inaya']);
});

//Routing View Nilai
Route::get('/nilai', function () {
    return view('nilai');
});

//Routing View Daftar Nilai
Route::get('/daftarNilai', function () {
    return view('daftar_nilai');
});

//Routing View layouts
Route::get('/framework', function () {
    return view('layouts.index');
});
//Akhir Pertemuan 4


//Pertemuan 5
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\HomeController;
Route::get(
'/aboutus',[HomeController::class, 'aboutus']);

//Akhir Pertemuan 5


//Pertemuan 6
//Routing View Data Pegawai
Route::get(
    '/pegawai',
    [PegawaiController::class, 'index']
)->name('pegawai.index');	
//Akhir Pertemuan 6

//Tugas 6
//Routing View Data Anggota
Route::get(
    '/anggota',
    [AnggotaController::class, 'index']
)->name('anggota.index');

//Pertemuan 7
Route::get(
    '/pegawai/create',
    [PegawaiController::class, 'create']
)->name('pegawai.create');

Route::post(
    '/pegawai/store',
    [PegawaiController::class, 'store']
)->name('pegawai.store');
//Akhir Pertemuan 7

//Tugas 7
Route::get(
    '/anggota/create',
    [AnggotaController::class, 'create']
)->name('anggota.create');

Route::post(
    '/anggota/store',
    [AnggotaController::class, 'store']
)->name('anggota.store');
//Akhir Tugas 7

//Pertemuan 9
//Routing View Data Pengarang, Penerbit, Kategori, Buku
Route::resource('pengarang', PengarangController::class);
Route::resource('penerbit', PenerbitController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('buku', BukuController::class);
//Akhir Pertemuan 9

//Tugas 9
//Routing View Data Matakuliah, Jurusan, Dosen, Mahasantri
Route::resource('matakuliah', MatakuliahController::class);
Route::resource('jurusan', JurusanController::class);
Route::resource('dosen', DosenController::class);
Route::resource('mahasantri', MahasantriController::class);
//Akhir Tugas 9
