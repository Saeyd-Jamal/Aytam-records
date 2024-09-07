<?php

use App\Http\Controllers\RecordController;
use App\Http\Controllers\RecordsConstantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix'=> '',
    'middleware' => ['auth'],
], function () {
    Route::get('/', function () {return view('welcome');})->name('dashboard');
    Route::get('records/recordsConstants', [RecordsConstantController::class, 'index'])->name('records-recordsConstants');;
    Route::post('records/recordsConstants/create', [RecordsConstantController::class, 'store'])->name('records-recordsConstants-create');;
    Route::post('records/recordsConstants/update', [RecordsConstantController::class, 'update'])->name('records-recordsConstants-update');;
    Route::delete('records/recordsConstants/delete', [RecordsConstantController::class, 'destroy'])->name('records-recordsConstants-destroy');;

    Route::post('records/checkID',[RecordController::class,'checkID']);
    Route::post('records/importFile',[RecordController::class,'import'])->name('records-import');

    Route::resources([
        'records' => RecordController::class,
        'users' => UserController::class
    ]);
});
