<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Sach;
use App\Http\Controllers\SachController;
use App\Http\Controllers\SinhvienController;
use App\Http\Controllers\SinhvienSach;
use App\Http\Controllers\SinhvienSachController;
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
    return view('layout_admin');
});

Route::get('/admin',[AdminController::class,'index'])->name('admin.home');
Route::get('/sinhvien',[SinhvienController::class,'index'])->name('sinhvien.index');
Route::get('/addsinhvien',[SinhvienController::class,'create'])->name('sinhvien.create');
Route::post('/addsinhvien',[SinhvienController::class,'store'])->name('sinhvien.store');
Route::get('/editsinhvien/{id}',[SinhvienController::class,'edit'])->name('sinhvien.edit');
Route::put('/editsinhvien/{id}',[SinhvienController::class,'update'])->name('sinhvien.update');
Route::delete('/delete-sv/{id}',[SinhvienController::class,'destroy'])->name('sinhvien.destroy');

//

Route::get('/sach',[SachController::class,'index'])->name('sach.index');
Route::get('/addsach',[SachController::class,'create'])->name('sach.create');
Route::post('/addsach',[SachController::class,'store'])->name('sach.store');
Route::get('/editsach/{id}',[SachController::class,'edit'])->name('sach.edit');
Route::put('/editsach/{id}',[SachController::class,'update'])->name('sach.update');
Route::delete('/delete/{id}',[SachController::class,'destroy'])->name('sach.destroy');
//
Route::get('/sachsv',[SinhvienSachController::class,'index'])->name('sachsv.index');
Route::get('/addsachsv',[SinhvienSachController::class,'create'])->name('sachsv.create');
Route::post('/addsachsv',[SinhvienSachController::class,'store'])->name('sachsv.store');
Route::get('/editsachsv/{id}',[SinhvienSachController::class,'edit'])->name('sachsv.edit');
Route::put('/editsachsv/{id}',[SinhvienSachController::class,'update'])->name('sachsv.update');
Route::delete('/deletesv/{id}',[SinhvienSachController::class,'destroy'])->name('sachsv.destroy');
//filter date
Route::get('/sachsv_search',[SinhvienSachController::class,'search'])->name('sachsv.search');

