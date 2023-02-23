<?php

use App\Http\Controllers\TestController;
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

Route::get('/', function () {
    return redirect('/test');
});

Route::get('/test',[TestController::class,'index']);
Route::post('/add-test',[TestController::class,'adddata'])->name('test.adddata');
Route::get('/edit-test',[TestController::class,'editData'])->name('test.editData');
Route::post('/update-test',[TestController::class,'updateData'])->name('test.updateData');
Route::post('/delete-test',[TestController::class,'deleteData'])->name('test.deleteData');






