<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

use App\Domains\Perosn\Http\Controllers\Api\Perosn\PerosnController;

Route::group([
    'prefix' => 'perosn',
    'as' => 'perosn.',
], function () {

    Route::get('/', [PerosnController::class, 'index'])->name('index');
    Route::post('/', [PerosnController::class, 'store'])->name('store');
    Route::group(['prefix' => '{project}'], function () {
        Route::get('/', [PerosnController::class, 'show'])->name('show');
        Route::put('/', [PerosnController::class, 'update'])->name('update');
        Route::delete('/', [PerosnController::class, 'delete'])->name('destroy');
    });
});

use App\Domains\Perosn\Http\Controllers\Api\Perosn\PerosnController;

Route::group([
    'prefix' => 'perosn',
    'as' => 'perosn.',
], function () {

    Route::get('/', [PerosnController::class, 'index'])->name('index');
    Route::post('/', [PerosnController::class, 'store'])->name('store');
    Route::group(['prefix' => '{project}'], function () {
        Route::get('/', [PerosnController::class, 'show'])->name('show');
        Route::put('/', [PerosnController::class, 'update'])->name('update');
        Route::delete('/', [PerosnController::class, 'delete'])->name('destroy');
    });
});
