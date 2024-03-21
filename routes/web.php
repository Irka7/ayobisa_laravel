<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

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

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login')->middleware('guest');
    Route::post('login/access', 'authenticate');
    Route::get('logout', 'logout');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('templates.home', [
            'title' => 'Dashboard'
        ]);
    });



    Route::resource('kategori', KategoriController::class);
    Route::get('export/kategori', [KategoriController::class, 'exportData'])->name('export-kategori');
    Route::post('kategori/import', [KategoriController::class, 'importData'])->name('import-kategori');
    Route::get('kategori/PDF', [KategoriController::class, 'exportPDF'])->name('exportPDF-kategori');
    Route::resource('jenis', JenisController::class);
    Route::resource('user', UserController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('stok', StockController::class);

});
Route::get('transaksi', [TransactionController::class, 'index']);


// Route::get('/login', function() {
//     return view('login');
// });
