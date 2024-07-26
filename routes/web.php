<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todosController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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


//homepage todo route
Route::get('/',[todosController::class, 'index'])->name("todo.home")->middleware('auth');

//create todo route
Route::get('/create', function () {
    return view('layouts.create');
})->name("todo.create")->middleware('auth');

//edit todo route
Route::get('/edit/{id}',[todosController::class,'edit'])->name("todo.edit")->middleware('auth');

//update todo route
Route::post('/update', [todosController::class,'updateData'])->name("todo.updateData");

//store todo route
Route::post('/create', [todosController::class,'store'])->name("todo.store")->middleware('auth');

//delete toto route
Route::get('/delete/{id}', [todosController::class,'delete'])->name("todo.delete")->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
