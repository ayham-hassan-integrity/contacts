<?php

use App\Domains\Perosn\Http\Controllers\Backend\Perosn\DeletedPerosnController;
use App\Domains\Perosn\Http\Controllers\Backend\Perosn\PerosnController;
use App\Domains\Perosn\Models\Perosn;
use Tabuna\Breadcrumbs\Trail;

Route::group([
    'prefix' => 'perosn',
    'as' => 'perosn.',
], function () {

    Route::get('/', [PerosnController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__(' Perosns'), route('admin.perosn.index'));
        });


    Route::get('deleted', [DeletedPerosnController::class, 'index'])
        ->name('deleted')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.perosn.index')
                ->push(__('Deleted  Perosns'), route('admin.perosn.deleted'));
        });


    Route::get('create', [PerosnController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.perosn.index')
                ->push(__('Create Perosn'), route('admin.perosn.create'));
        });

    Route::post('/', [PerosnController::class, 'store'])->name('store');

    Route::group(['prefix' => '{perosn}'], function () {
        Route::get('/', [PerosnController::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail, Perosn $perosn) {
                $trail->parent('admin.perosn.index')
                    ->push($perosn->id, route('admin.perosn.show', $perosn));
            });

        Route::get('edit', [PerosnController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Perosn $perosn) {
                $trail->parent('admin.perosn.show', $perosn)
                    ->push(__('Edit'), route('admin.perosn.edit', $perosn));
            });

        Route::patch('/', [PerosnController::class, 'update'])->name('update');
        Route::delete('/', [PerosnController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '{deletedPerosn}'], function () {
        Route::patch('restore', [DeletedPerosnController::class, 'update'])->name('restore');
        Route::delete('permanently-delete', [DeletedPerosnController::class, 'destroy'])->name('permanently-delete');
    });
});