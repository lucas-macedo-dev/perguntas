<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\Task1Controller;
use App\Http\Controllers\Task3Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::prefix('task-1')->group(function () {
    Route::get('resolution', function () {
        return view('task-1.resolution');
    });
    Route::controller(Task1Controller::class)->group(function () {
        Route::post('register-cep', 'registerCep')->name('register-cep');
    });
});

Route::prefix('task-2')->group(function () {
    Route::get('resolution', function () {
        return view('task-2.resolution');
    });

    Route::get('/report/download', [ReportController::class, 'download'])->name('report.download');
});


Route::controller(Task3Controller::class)->group(function () {
    Route::get('/task-3/resolution','index')->name('task-3.resolution');
    Route::post('/task-3/progress',  'progress')->name('task-3.progress');
    Route::post('/task-3/reset', 'reset')->name('task-3.reset');
});
