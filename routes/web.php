<?php

use App\Http\Controllers\OrphanRecordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecordsConstantController;
use App\Http\Controllers\UserController;
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

Route::group([
    "middleware" => ['auth', 'verified'],
    'prefix' => 'salah1'
], function () {
    Route::get('/', function () {
        return view('dashboard.index');
    });
    Route::get('/404', function () {
        return view('dashboard.500');
    });



    Route::get('orphans_records/recordsConstants', [RecordsConstantController::class, 'index'])->name('orphans_records-recordsConstants');;
    Route::post('orphans_records/recordsConstants/create', [RecordsConstantController::class, 'store'])->name('orphans_records-recordsConstants-create');;
    Route::post('orphans_records/recordsConstants/update', [RecordsConstantController::class, 'update'])->name('orphans_records-recordsConstants-update');;
    Route::delete('orphans_records/recordsConstants/delete', [RecordsConstantController::class, 'destroy'])->name('orphans_records-recordsConstants-destroy');;

        Route::get('orphans_records/filterError/', [OrphanRecordController::class,'filterError']);
        Route::get('orphans_records/getData/', [OrphanRecordController::class,'getData']);
        Route::get('orphans_records/checkID/', [OrphanRecordController::class,'checkID']);

    Route::post('orphans_records/importFile',[OrphanRecordController::class,'import'])->name('orphans_records-import');
    Route::get('orphans_records/exportFile', [OrphanRecordController::class, 'export'])->name('orphans_records-export');;

    Route::resource('orphans_records', OrphanRecordController::class);

    Route::get('users/table_users', [UserController::class,'table_users'])->name('users-table');
    Route::resource('users', UserController::class);
    Route::get('myProfile', [UserController::class,'index'])->name('users-myProfile');


});




require __DIR__.'/auth.php';
