<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Cors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get-users',[UserController::class,'GetAllUsers']);
Route::post('/register-user', [AuthController::class, 'RegisterUser'])->middleware(Cors::class);
// Route::post('/login-user', [AuthController::class, 'login'])->middleware('cors');
// Route::post('/logout-user', [AuthController::class, 'logout'])->middleware('cors');
// Route::middleware('auth:sanctum')->post('/email-verify',[AuthController::class,'']);

// Route::post('/verify-email',[AuthController::class,'emailVerify']);

Route::post('/login-user',[AuthController::class, 'login'])->middleware(Cors::class);
