<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\ChucVuController;
use App\Http\Controllers\PhongController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('/nhanvien', NhanVienController::class);
Route::resource('/chucvu', ChucVuController::class);
Route::resource('/phong', PhongController::class);
Route::get('/', function () {
    return view('layout');
    
});
