<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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



Route::get('/',[AuthController::class, 'login'])->name("login");
Route::get('/login',[AuthController::class, 'login'])->name("login");
Route::post('/login',[AuthController::class, 'loginPost'])->name("login.post");
Route::match(['get', 'post'],'/logout',[AuthController::class, 'logOut'])->name("logOut");
Route::match(['get', 'post'],'/isLogged',[AuthController::class, 'isLogged'])->middleware('isLogged')->name("isLoggedCheck");

Route::middleware('auth')->group(function(){
  Route::match(['get', 'post'],'/home',[AuthController::class, 'index'])->name("home");
});
