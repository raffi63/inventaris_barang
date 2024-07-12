<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
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

Auth::routes();


Route::get('report', [App\Http\Controllers\LaporanController::class, 'index'])->middleware('auth');
Route::get('pdf/download', [App\Http\Controllers\LaporanController::class, 'download_pdf'])->middleware('auth');
Route::get('pdf/view', [App\Http\Controllers\LaporanController::class, 'view_pdf'])->middleware('auth');
Route::get('print', [App\Http\Controllers\BarangController::class, 'print'])->middleware('auth');
Auth::routes();

// Route::get('/home', function() {
//     return view('home');
// })->name('index')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/filter', [App\Http\Controllers\BarangController::class, 'filter'])->name('filter');

Route::middleware(['auth', 'level:admin'])->group(function () {
    Route::resource('users', \App\Http\Controllers\UserController::class);
    
    Route::resource('pegawai', \App\Http\Controllers\PegawaiController::class);
    Route::resource('barangkeluar', \App\Http\Controllers\BarangkeluarController::class);
    Route::resource('barangmasuk', \App\Http\Controllers\BarangmasukController::class);
    Route::resource('logbarang', \App\Http\Controllers\LogbarangController::class);
    //semua route dalam grup ini hanya bisa diakses oleh admin
});

Route::middleware(['auth', 'level:reader'])->group(function () {
    
    //semua route dalam grup ini hanya bisa diakses oleh reader
});
Route::resource('barang', \App\Http\Controllers\BarangController::class)->middleware('auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');