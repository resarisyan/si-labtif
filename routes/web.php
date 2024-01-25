<?php

use App\Http\Controllers\Admin\AsistenController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\MataPraktikumController;
use App\Http\Controllers\Admin\RuanganController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::group(
        [
            'middleware' => ['role:admin'],
            'prefix' => 'admin',
            'as' => 'admin.'
        ],
        function () {
            Route::group([
                'prefix' => 'asisten',
                'as' => 'asisten.',
            ], function () {
                Route::get('/', [AsistenController::class, 'index'])->name('index');
                Route::post('/', [AsistenController::class, 'store'])->name('store');
                Route::put('/status', [AsistenController::class, 'changeStatus'])->name('changeStatus');
                Route::put('/{id}', [AsistenController::class, 'update'])->name('update');
                Route::get('/{id}', [AsistenController::class, 'edit'])->name('edit');
                Route::delete('/{id}', [AsistenController::class, 'destroy'])->name('destroy');
            });

            Route::group([
                'prefix' => 'jurusan',
                'as' => 'jurusan.',
            ], function () {
                Route::get('/', [JurusanController::class, 'index'])->name('index');
                Route::post('/', [JurusanController::class, 'store'])->name('store');
                Route::put('/{id}', [JurusanController::class, 'update'])->name('update');
                Route::get('/{id}', [JurusanController::class, 'edit'])->name('edit');
                Route::delete('/{id}', [JurusanController::class, 'destroy'])->name('destroy');
            });

            Route::group([
                'prefix' => 'kelas',
                'as' => 'kelas.',
            ], function () {
                Route::get('/', [KelasController::class, 'index'])->name('index');
                Route::post('/', [KelasController::class, 'store'])->name('store');
                Route::put('/{id}', [KelasController::class, 'update'])->name('update');
                Route::get('/{id}', [KelasController::class, 'edit'])->name('edit');
                Route::delete('/{id}', [KelasController::class, 'destroy'])->name('destroy');
            });

            Route::group([
                'prefix' => 'ruangan',
                'as' => 'ruangan.',
            ], function () {
                Route::get('/', [RuanganController::class, 'index'])->name('index');
                Route::post('/', [RuanganController::class, 'store'])->name('store');
                Route::put('/{id}', [RuanganController::class, 'update'])->name('update');
                Route::get('/{id}', [RuanganController::class, 'edit'])->name('edit');
                Route::delete('/{id}', [RuanganController::class, 'destroy'])->name('destroy');
            });

            Route::group([
                'prefix' => 'mata-praktikum',
                'as' => 'mata-praktikum.',
            ], function () {
                Route::get('/', [MataPraktikumController::class, 'index'])->name('index');
                Route::post('/', [MataPraktikumController::class, 'store'])->name('store');
                Route::put('/{id}', [MataPraktikumController::class, 'update'])->name('update');
                Route::get('/{id}', [MataPraktikumController::class, 'edit'])->name('edit');
                Route::delete('/{id}', [MataPraktikumController::class, 'destroy'])->name('destroy');
            });
        }
    );



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
