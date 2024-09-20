<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WalikelasController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [WalikelasController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

// Di route/web.php
// Route::group(['middleware' => ['auth', 'role:siswa']], function () {
//     Route::get('/siswa/dashboard', 'SiswaController@index'); // Akses siswa
// });

Route::group(['middleware' => ['auth','verified']], function () {
   Route::prefix('wali_kelas')->group(function(){
        Route::get('/index', [WalikelasController::class, 'index'])->name(name: 'wali_kelas.index');
        Route::post('/list', [WalikelasController::class, 'list'])->name(name: 'wali_kelas.list');
        Route::get('/create', [WalikelasController::class, 'create'])->name(name: 'wali_kelas.create');
        Route::post('/', [WalikelasController::class, 'store'])->name(name: 'wali_kelas.store');
        Route::get('/{id}', [WalikelasController::class, 'show'])->name(name: 'wali_kelas.show');
        Route::get('/{id}/edit', [WalikelasController::class, 'edit'])->name(name: 'wali_kelas.edit');
        Route::put('/{id}', [WalikelasController::class, 'update'])->name(name: 'wali_kelas.update');
        Route::delete('/{id}', [WalikelasController::class, 'destroy'])->name(name: 'wali_kelas.destroy');
   });      
});

// Route::group(['middleware' => ['auth', 'role:bendahara']], function () {
//     Route::get('/bendahara/rekap', 'BendaharaController@rekap'); // Akses bendahara
// });

// Route::group(['middleware' => ['auth', 'role:kepala_sekolah']], function () {
//     Route::get('/kepala_sekolah/laporan', 'KepalaSekolahController@lihatLaporan'); // Akses kepala sekolah
// });


require __DIR__.'/auth.php';