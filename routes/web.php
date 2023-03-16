<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [PageController::class, 'home']);

Route::get('/user', [UserController::class, 'index'])->middleware('isLogin');
Route::get('/user/create', [UserController::class, 'create'])->middleware('isAdmin');
Route::post('/user/save', [UserController::class, 'save'])->middleware('isAdmin');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->middleware('isAdmin');
Route::put('/user/edit/{id}', [UserController::class, 'update'])->middleware('isAdmin');
Route::get('/user/{id}', [UserController::class, 'show'])->middleware('isLogin');
Route::delete('/user/{id}', [UserController::class, 'delete'])->middleware('isAdmin');

Route::get('/candidat', [CandidatController::class, 'index'])->middleware('isLogin');
Route::get('/candidat/create', [CandidatController::class, 'create'])->middleware('isAdmin');
Route::post('/candidat/save', [CandidatController::class, 'save'])->middleware('isAdmin');
Route::get('/candidat/edit/{id}', [CandidatController::class, 'edit'])->middleware('isAdmin');
Route::put('/candidat/edit/{id}', [CandidatController::class, 'update'])->middleware('isAdmin');
Route::get('/candidat/{id}', [CandidatController::class, 'show'])->middleware('isLogin');
Route::delete('/candidat/{id}', [CandidatController::class, 'delete'])->middleware('isAdmin');

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'login_check']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('isLogin');