<?php

use App\Http\Controllers\Dash\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/authenticated', function () {
    return true;
});

Route::post('/dashRegister', [AuthController::class, 'dashRegister']);
Route::post('/dashLogin', [AuthController::class, 'dashLogin']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('user/del/{id}', [AuthController::class, 'delUser']);
Route::get('/users', [AuthController::class, 'users']);
Route::post('user/edit/{id}', [AuthController::class, 'update']);
Route::get('user/show/{id}', [AuthController::class, 'show']);
