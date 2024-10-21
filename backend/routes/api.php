<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;

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


Route::get('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route::group(['middleware' => 'jwt'], function () {
    Route::get('karyawan', [EmployeeController::class, 'index']);
    Route::post('karyawan', [EmployeeController::class, 'store']);
    Route::delete('karyawan/{id}', [EmployeeController::class, 'destroy']);
    Route::put('karyawan/{id}', [EmployeeController::class, 'update']);
// });
