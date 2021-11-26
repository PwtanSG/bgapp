<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
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
Route::pattern('id', '[0-9]+');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/records/create', [RecordsController::class,'create']);
Route::get('/records', [RecordsController::class,'index'])->name('records');
Route::get('/records/{id}/edit', [RecordsController::class,'edit']);
Route::get('/records/{id}', [RecordsController::class,'show']);
Route::post('/records', [RecordsController::class,'store']);
Route::put('/records/{id}', [RecordsController::class,'update']);
Route::delete('/records/{id}', [RecordsController::class,'destroy']);


Route::get('/about', function(){
    return view('pages.about');  
})->name('about');

Route::get('/', function () {
    return view('pages.index', ['title'=>'Your Health Buddy']);
})->name('home');
