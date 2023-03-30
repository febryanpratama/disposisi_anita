<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Pemohon\SuratController as PemohonSuratController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Setda\SetdaController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\Verifikator\VerifikatorSuratController;
use App\Http\Controllers\Walikota\WalikotaController;
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

Route::get('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/register', [AuthController::class, 'storeData']);
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


Route::group([
    'prefix' => 'pemohon',
    'middleware' => ['auth', 'role:Pemohon']
], function () {
    // Route::get('')
    Route::group([
        'prefix' => 'surat',
        'controller' => PemohonSuratController::class,
    ], function () {
        Route::get('/', 'index');
        Route::post('/', 'inputSurat');
    });
});

Route::group([
    'prefix' => 'verifikator',
    'middleware' => ['auth', 'role:Verifikator']
], function () {
    Route::group([
        'prefix' => 'surat',
        'controller' => VerifikatorSuratController::class
    ], function () {
        Route::get('/', 'index');
        // Route:
        Route::get('/{id}', 'detail');
        Route::get('/{id}/setuju', 'setuju');
        Route::get('/{id}/tolak', 'tolak');
    });
});


// Setda
Route::group([
    'prefix' => 'setda',
    'middleware' => ['auth', 'role:Setda']
], function () {
    Route::group([
        'prefix' => 'surat',
        'controller' => SetdaController::class
    ], function () {
        Route::get('/', 'index');
        // Route:
        Route::get('/{id}', 'detail');
        Route::get('/{id}/setuju', 'setuju');
        Route::get('/{id}/tolak', 'tolak');
    });
});

// Walikota
Route::group([
    'prefix' => 'walikota',
    'middleware' => ['auth', 'role:Walikota']
], function () {
    Route::group([
        'prefix' => 'surat',
        'controller' => WalikotaController::class
    ], function () {
        Route::get('/', 'index');
        // Route:
        Route::get('/{id}', 'detail');
        Route::get('/{id}/setuju', 'setuju');
        Route::get('/{id}/tolak', 'tolak');
    });
});

require __DIR__ . '/auth.php';
