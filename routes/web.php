<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
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


Route::get('/', function () {
    return view('index', ["user" => auth()->user()]);
})->middleware('auth');
Route::get('/forgot', function () {
    return view('forgot');
})->middleware("guest");

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware("guest");


Route::post('/login', [AuthController::class, "index"]);
Route::post('/forgot', [AuthController::class, "change"]);
Route::get('/change/{id}', [AuthController::class, "changepass"])->middleware('auth');
Route::post('/change/{id}', [AuthController::class, "changepassword"])->middleware('auth');
Route::get('/logout/{id}', [AuthController::class, "logout"]);
Route::get('/customer/addnew', [CustomerController::class, "index"])->middleware('auth');
Route::get("/customer", [CustomerController::class, "display"])->middleware('auth');
Route::post("/customer", [CustomerController::class, "store"])->middleware('auth');
Route::get("/customer/edit/{id}", [CustomerController::class, "edit"])->middleware('auth');
Route::post("/customer/edit/{id}", [CustomerController::class, "update"])->middleware('auth');
Route::get("/customer/delete/{id}", [CustomerController::class, "delete"])->middleware('auth');



Route::post('/emailvalidate', [CustomerController::class, "uniqueemail"])->middleware('auth');
Route::post('/usernamevalidate', [CustomerController::class, "checkusername"])->middleware('auth');
