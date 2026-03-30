<?php

use App\Http\Controllers\AlurPencairan\AlurPencairanAlurProsesController;
use App\Http\Controllers\AlurPencairan\AlurPencairanController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'access_permission'])->group(function () {

    Route::group(["controller" => AlurPencairanController::class, "prefix" => "alur_pencairan", "as" => "alur_pencairan."], function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::get('{id}/edit', 'edit')->name('edit');
    });
    Route::group(["controller" => AlurPencairanAlurProsesController::class, "prefix" => "alur_pencairan_alur_proses", "as" => "alur_pencairan_alur_proses."], function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::get('{id}/edit', 'edit')->name('edit');
    });
});
