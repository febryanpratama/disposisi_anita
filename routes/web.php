<?php

use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Route;

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

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', function () {
    // return view('welcome');
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->middleware(['auth', 'role:Admin'])->group(function () {

    Route::group([
        'prefix' => 'surat',
        'controller' => SuratController::class
    ], function () {
        Route::get('/', 'index');
        Route::post('/', 'store');

        Route::get('/{surat_id}/verifikasi', 'verifikasi');
        Route::get('/{surat_id}/tolak', 'tolak');
        Route::get('/{surat_id}/diterima', 'diterima');
    });

    Route::group([
        'prefix' => 'pengguna',
        'controller' => PenggunaController::class
    ], function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
    });
});

require __DIR__ . '/auth.php';
