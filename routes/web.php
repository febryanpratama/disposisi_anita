<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontController;
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

Route::group([
    'prefix' => '/',
    'controller' => FrontController::class,
], function () {

    Route::get('/', 'indexLanding');
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
        // Route::get('/', 'index');
        // Route::post('/', 'store');

        Route::get('/{surat_id}/detail', 'detail');
        Route::get('/{surat_id}/verifikasi', 'verifikasi');
        Route::get('/{surat_id}/setuju', 'diterima');
        Route::get('/{surat_id}/tolak', 'tolak');
    });
    Route::get('individu', [SuratController::class, 'indexIndividu']);
    Route::get('organisasi', [SuratController::class, 'indexOrganisasi']);

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
        Route::get('/{id}', 'detail');
    });

    Route::group([
        'prefix' => 'profil',
        'controller' => PemohonSuratController::class
    ], function () {
        Route::get('/', 'indexProfil');
        Route::post('/', 'editProfil');
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
    'middleware' => ['auth', 'role:Setda'],
    'controller' => SetdaController::class
], function () {

    Route::get('/individu', 'indexIndividu');
    Route::get('/organisasi', 'indexOrganisasi');
    Route::group([
        'prefix' => 'surat',
        'controller' => SetdaController::class
    ], function () {
        Route::get('/', 'index');
        // Route:
        Route::get('/{id}', 'detail');
        Route::POST('/{id}/setuju', 'setuju');
        // Route::get('/{id}/tolak', 'tolak');
    });
});

// Walikota
Route::group([
    'prefix' => 'walikota',
    'controller' => WalikotaController::class,
    'middleware' => ['auth', 'role:Walikota']
], function () {
    Route::group([
        'prefix' => 'individu',
    ], function () {
        Route::get('/', 'indexIndividu');
        // Route:
        Route::get('/{id}', 'detail');
        Route::get('/{id}/setuju', 'setuju');
        Route::get('/{id}/tolak', 'tolak');
    });

    Route::group([
        'prefix' => 'organisasi',
    ], function () {
        Route::get('/', 'indexOrganisasi');
        // Route:
        Route::get('/{id}', 'detail');
        Route::get('/{id}/setuju', 'setuju');
        Route::get('/{id}/tolak', 'tolak');
    });

    Route::group([
        'prefix' => 'daftar-penerima'
    ], function () {
        Route::get('/', 'caridaftarpenerima');
        Route::post('/', 'cariHistoriPengajuan');
    });
    Route::group([
        'prefix' => 'histori-pengajuan'
    ], function () {
        Route::get('/', 'historiPengajuan');
        Route::post('/', 'cariHistoriPengajuan');
    });
});

require __DIR__ . '/auth.php';
