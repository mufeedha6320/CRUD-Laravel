<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', [HomeController::class, 'admin'])->name('admin')->middleware(['auth','admin']);

Route::get('/newregister',[HomeController::class,'newregister'])->name('newregister');

Route::get('/userupdate/{id}/edit',[HomeController::class,'update'])->name('userupdate.edit');
Route::put('/userupdate/update/{id}',[HomeController::class,'userupdated'])->name('userupdate.update');

Route::get('/userdelete/{id}',[HomeController::class,'userdelete'])->name('userdelete');
Route::get('/mytable',[HomeController::class,'mytable'])->name('mytable');
Route::post('/userstore',[HomeController::class,'storeFun'])->name('userstore');
require __DIR__.'/auth.php';
