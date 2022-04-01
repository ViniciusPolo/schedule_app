<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;

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
// ROTAS DE AUTENTICAÇÃO
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

//ROTAS DE TASK

Route::get('/create', [TaskController::class, 'create']);
Route::post('/store', [TaskController::class, 'store']);
Route::get('dashboard', [TaskController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('dashboard/delete/{id}', [TaskController::class, 'destroy']);
Route::get('/tasks/edit/{id}', [TaskController::class, 'edit']);
Route::post('/tasks/update/{id}', [TaskController::class, 'update']);
Route::get('/tasks/{id}', [TaskController::class, 'show']);