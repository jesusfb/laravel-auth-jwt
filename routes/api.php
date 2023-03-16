<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/candidat', [ApiController::class, 'index'])->middleware('apiGuard');
Route::get('/candidat/{id}', [ApiController::class, 'show'])->middleware('apiGuard');
Route::post('/candidat/create', [ApiController::class, 'create'])->middleware('apiAdminGuard');
Route::post('/candidat/{id}', [ApiController::class, 'update'])->middleware('apiAdminGuard');
Route::delete('/candidat/{id}', [ApiController::class, 'delete'])->middleware('apiAdminGuard');

Route::post('/login', [ApiController::class, 'login']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });