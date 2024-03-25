<?php

use App\Http\Controllers\ContenController;
use App\Http\Controllers\MapelController;
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
    return view('welcome');
});
Route::resource('mapel', Mapelcontroller::class);
Route::resource('siswa', Siswacontroller::class);
Route::resource('jurusan', Jurusancontroller::class);
Route::resource('buku', Bukucontroller::class);
Route::get('/home',[ContenController::class, 'index']);
Route::get('/rpl',[ContenController::class, 'rpl']);
